<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware(['auth']);
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    public function resetPassword(User $user)
    {
        $user->password = bcrypt(config('custom.default_password'));
        $user->save();

        return $this->sendSuccessDialogResponse('Mot de passe réinitiliasé avec succès');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $inputs['email_verified_at'] = Carbon::now();
        $this->userRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/users.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('models/users.singular') . ' ' . __('messages.not_found'));

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    public function changePassword()
    {
        return view('users.change-password');
    }

    public function handleChangePassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required|min:6|max:255|password',
            'new_password' => 'required|min:6|max:255|confirmed'
        ]);

        /** @var User $user */
        $user = auth()->user();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return $this->sendSuccessDialogResponse('Mot de passe changé avec succès');
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/users.singular')]));
        }

        $this->userRepository->update($request->all(), $id);
        $message = __('messages.updated', ['model' => __('models/users.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/users.singular')]));
        }

        $this->userRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/users.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
