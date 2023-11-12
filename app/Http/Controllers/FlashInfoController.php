<?php

namespace App\Http\Controllers;

use App\DataTables\FlashInfoDataTable;
use App\Http\Requests\CreateFlashInfoRequest;
use App\Http\Requests\UpdateFlashInfoRequest;
use App\Repositories\FlashInfoRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class FlashInfoController extends AppBaseController
{
    /** @var  FlashInfoRepository */
    private $flashInfoRepository;

    public function __construct(FlashInfoRepository $flashInfoRepo)
    {
        $this->flashInfoRepository = $flashInfoRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the FlashInfo.
     *
     * @param FlashInfoDataTable $flashInfoDataTable
     * @return Response
     */
    public function index(FlashInfoDataTable $flashInfoDataTable)
    {
        return $flashInfoDataTable->render('flash_infos.index');
    }

    /**
     * Store a newly created FlashInfo in storage.
     *
     * @param CreateFlashInfoRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateFlashInfoRequest $request)
    {
        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->flashInfoRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/flashInfos.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Show the form for creating a new FlashInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('flash_infos.create');
    }

    /**
     * Display the specified FlashInfo.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $flashInfo = $this->flashInfoRepository->find($id);

        if (empty($flashInfo)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('flash_infos.show')->with('flashInfo', $flashInfo);
    }

    /**
     * Show the form for editing the specified FlashInfo.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $flashInfo = $this->flashInfoRepository->find($id);

        if (empty($flashInfo)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('flash_infos.edit')->with('flashInfo', $flashInfo);
    }

    /**
     * Update the specified FlashInfo in storage.
     *
     * @param int $id
     * @param UpdateFlashInfoRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateFlashInfoRequest $request)
    {
        $flashInfo = $this->flashInfoRepository->find($id);

        if (empty($flashInfo)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/flashInfos.singular')]));
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->flashInfoRepository->update($inputs, $id);
        $message = __('messages.updated', ['model' => __('models/flashInfos.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified FlashInfo from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $flashInfo = $this->flashInfoRepository->find($id);

        if (empty($flashInfo)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/flashInfos.singular')]));
        }

        $this->flashInfoRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/flashInfos.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
