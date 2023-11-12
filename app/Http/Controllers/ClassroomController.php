<?php

namespace App\Http\Controllers;

use App\DataTables\ClassroomDataTable;
use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Jobs\SaveMarksJob;
use App\Models\Classroom;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Repositories\ClassroomRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ClassroomController extends AppBaseController
{
    /** @var  ClassroomRepository */
    private $classroomRepository;

    public function __construct(ClassroomRepository $classroomRepo)
    {
        $this->classroomRepository = $classroomRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the Classroom.
     *
     * @param ClassroomDataTable $classroomDataTable
     * @return Response
     */
    public function index(ClassroomDataTable $classroomDataTable)
    {
        return $classroomDataTable->render('classrooms.index');
    }

    /**
     * Show the form for creating a new Classroom.
     *
     * @return Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created Classroom in storage.
     *
     * @param CreateClassroomRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateClassroomRequest $request)
    {
        $inputs = $request->all();
        $this->classroomRepository->create($inputs);
        $message = 'Classe enregistrée avec succès';
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Display the specified Classroom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classroom = $this->classroomRepository->find($id);

        if (empty($classroom)) {
            Flash::error(__('models/classrooms.singular').' '.__('messages.not_found'));

            return redirect(route('classrooms.index'));
        }

        return view('classrooms.show')->with('classroom', $classroom);
    }

    /**
     * Show the form for editing the specified Classroom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classroom = $this->classroomRepository->find($id);

        if (empty($classroom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/classrooms.singular')]));

            return redirect(route('classrooms.index'));
        }

        return view('classrooms.edit')->with('classroom', $classroom);
    }

    /**
     * Update the specified Classroom in storage.
     *
     * @param  int              $id
     * @param UpdateClassroomRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateClassroomRequest $request)
    {
        $classroom = $this->classroomRepository->find($id);

        if (empty($classroom)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/classrooms.singular')]));
        }

        $this->classroomRepository->update($request->all(), $id);
        $message = 'Classe mise à jour avec succès';
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified Classroom from storage.
     *
     * @param  int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $classroom = $this->classroomRepository->find($id);

        if (empty($classroom)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/classrooms.singular')]));
        }

        $this->classroomRepository->delete($id);
        $message = 'Classe supprimée avec succès';
        return $this->sendSuccessDialogResponse($message);
    }

    public function register(Request $request, Classroom $classroom) {
        if ($request->method() == 'GET') {
            $students = Student::all();
            return view('classrooms.register', compact('students'))->withId($classroom->id);
        }
        $classroom->students()->attach($request->input('student_id'));

        return $this->sendSuccessDialogResponse('Inscription effectuée avec succès', true);
    }

    public function addMark(Request $request, Classroom $classroom) {
        if ($request->method() == 'GET') {
            $subjects = Subject::all();
            $students = $classroom->students;
            return view('classrooms.add_mark', compact('subjects', 'students'))->withId($classroom->id);
        }
        SaveMarksJob::dispatchAfterResponse($request->all(), $classroom->id);
        return $this->sendSuccessDialogResponse('Notes enregistrées avec succès', true);
    }
}
