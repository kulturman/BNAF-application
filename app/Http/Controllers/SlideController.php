<?php

namespace App\Http\Controllers;

use App\DataTables\SlideDataTable;
use App\Http\Requests\CreateSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Repositories\SlideRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class SlideController extends AppBaseController
{
    /** @var  SlideRepository */
    private $slideRepository;

    public function __construct(SlideRepository $slideRepo)
    {
        $this->slideRepository = $slideRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the Slide.
     *
     * @param SlideDataTable $slideDataTable
     * @return Response
     */
    public function index(SlideDataTable $slideDataTable)
    {
        return $slideDataTable->render('slides.index');
    }

    /**
     * Show the form for creating a new Slide.
     *
     * @return Response
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * Store a newly created Slide in storage.
     *
     * @param CreateSlideRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateSlideRequest $request)
    {
        $inputs = $request->all();
        $this->slideRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/slides.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Display the specified Slide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $slide = $this->slideRepository->find($id);

        if (empty($slide)) {
            Flash::error(__('models/slides.singular').' '.__('messages.not_found'));

            return redirect(route('slides.index'));
        }

        return view('slides.show')->with('slide', $slide);
    }

    /**
     * Show the form for editing the specified Slide.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slide = $this->slideRepository->find($id);

        if (empty($slide)) {
            Flash::error(__('messages.not_found', ['model' => __('models/slides.singular')]));

            return redirect(route('slides.index'));
        }

        return view('slides.edit')->with('slide', $slide);
    }

    /**
     * Update the specified Slide in storage.
     *
     * @param  int              $id
     * @param UpdateSlideRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateSlideRequest $request)
    {
        $slide = $this->slideRepository->find($id);

        if (empty($slide)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/slides.singular')]));
        }

        $this->slideRepository->update($request->all(), $id);
        $message = __('messages.updated', ['model' => __('models/slides.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified Slide from storage.
     *
     * @param  int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $slide = $this->slideRepository->find($id);

        if (empty($slide)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/slides.singular')]));
        }

        $this->slideRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/slides.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
