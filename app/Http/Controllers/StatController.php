<?php

namespace App\Http\Controllers;

use App\DataTables\StatDataTable;
use App\Http\Requests\CreateStatRequest;
use App\Http\Requests\UpdateStatRequest;
use App\Repositories\StatRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class StatController extends AppBaseController
{
    /** @var  StatRepository */
    private $statRepository;

    public function __construct(StatRepository $statRepo)
    {
        $this->statRepository = $statRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the Stat.
     *
     * @param StatDataTable $statDataTable
     * @return Response
     */
    public function index(StatDataTable $statDataTable)
    {
        return $statDataTable->render('stats.index');
    }

    /**
     * Show the form for creating a new Stat.
     *
     * @return Response
     */
    public function create()
    {
        return view('stats.create');
    }

    /**
     * Store a newly created Stat in storage.
     *
     * @param CreateStatRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateStatRequest $request)
    {
        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->statRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/stats.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Display the specified Stat.
     *
     * @param  int $id
     *
     */
    public function show($id)
    {
        $stat = $this->statRepository->find($id);

        if (empty($stat)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('stats.show')->with('stat', $stat);
    }

    /**
     * Show the form for editing the specified Stat.
     *
     * @param  int $id
     *
     */
    public function edit($id)
    {
        $stat = $this->statRepository->find($id);

        if (empty($stat)) {
           return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('stats.edit')->with('stat', $stat);
    }

    /**
     * Update the specified Stat in storage.
     *
     * @param  int              $id
     * @param UpdateStatRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateStatRequest $request)
    {
        $stat = $this->statRepository->find($id);

        if (empty($stat)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/stats.singular')]));
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->statRepository->update($inputs, $id);
        $message = __('messages.updated', ['model' => __('models/stats.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified Stat from storage.
     *
     * @param  int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $stat = $this->statRepository->find($id);

        if (empty($stat)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/stats.singular')]));
        }

        $this->statRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/stats.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
