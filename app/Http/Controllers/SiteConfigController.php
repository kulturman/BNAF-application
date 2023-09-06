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
     * Show the form for editing the specified SiteConfig.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteConfigs.singular')]));

            return redirect(route('siteConfigs.index'));
        }

        return view('site_configs.edit')->with('siteConfig', $siteConfig);
    }

    /**
     * Update the specified SiteConfig in storage.
     *
     * @param  int              $id
     * @param UpdateSiteConfigRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateSiteConfigRequest $request)
    {
        $siteConfig = $this->siteConfigRepository->find($id);

        if (empty($siteConfig)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        $this->siteConfigRepository->update($request->all(), $id);
        $message = __('messages.updated', ['model' => __('models/siteConfigs.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

}
