<?php

namespace App\Http\Controllers;

use App\DataTables\SiteConfigDataTable;
use App\Http\Requests\CreateSiteConfigRequest;
use App\Http\Requests\UpdateSiteConfigRequest;
use App\Repositories\SiteConfigRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class SiteConfigController extends AppBaseController
{
    /** @var  SiteConfigRepository */
    private $siteConfigRepository;

    public function __construct(SiteConfigRepository $siteConfigRepo)
    {
        $this->siteConfigRepository = $siteConfigRepo;
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the SiteConfig.
     *
     * @param SiteConfigDataTable $siteConfigDataTable
     * @return Response
     */
    public function index(SiteConfigDataTable $siteConfigDataTable)
    {
        return $siteConfigDataTable->render('site_configs.index');
    }

    /**
     * Store a newly created SiteConfig in storage.
     *
     * @param CreateSiteConfigRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateSiteConfigRequest $request)
    {
        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->siteConfigRepository->create($inputs);
        $message = __('messages.saved', ['model' => __('models/siteConfigs.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }

    /**
     * Show the form for creating a new SiteConfig.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_configs.create');
    }

    /**
     * Display the specified SiteConfig.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('site_configs.show')->with('siteConfig', $siteConfig);
    }

    /**
     * Show the form for editing the specified SiteConfig.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('site_configs.edit')->with('siteConfig', $siteConfig);
    }

    /**
     * Update the specified SiteConfig in storage.
     *
     * @param int $id
     * @param UpdateSiteConfigRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateSiteConfigRequest $request)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->siteConfigRepository->update($inputs, $id);
        $message = __('messages.updated', ['model' => __('models/siteConfigs.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified SiteConfig from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        $this->siteConfigRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/siteConfigs.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
