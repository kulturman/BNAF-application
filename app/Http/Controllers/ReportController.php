<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
        $this->middleware(['auth'])->except('store');
    }

    /**
     * Display a listing of the Report.
     *
     * @param ReportDataTable $reportDataTable
     * @return Response
     */
    public function index(ReportDataTable $reportDataTable)
    {
        return $reportDataTable->render('reports.index');
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreateReportRequest $request)
    {
        $inputs = $request->all();
        $this->attachFiles($inputs);

        if ($inputs['photoInput']) {
            $filename = 'public/uploads/' .sha1(mktime()) . '.png';
            @list($type, $fileData) = explode(';', $inputs['photoInput']);
            @list(, $fileData) = explode(',', $fileData);
            Storage::disk('local')->put(
                $filename
                , base64_decode($fileData)
            );

            $inputs['photoInput'] = str_replace('public', 'storage', $filename);
        }

        $this->reportRepository->create($inputs);
        $message = 'Alerte enregistrée avec succès, merci pour votre contribution';
        return $this->sendSuccessDialogResponse($message, true, route('frontend.form'));
    }

    /**
     * Display the specified Report.
     *
     * @param  int $id
     *
     */
    public function show($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param  int $id
     *
     */
    public function edit($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
           return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/siteConfigs.singular')]));
        }

        return view('reports.edit')->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param  int              $id
     * @param UpdateReportRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/reports.singular')]));
        }

        $inputs = $request->all();
        $this->attachFiles($inputs);
        $this->reportRepository->update($inputs, $id);
        $message = __('messages.updated', ['model' => __('models/reports.singular')]);
        return $this->sendSuccessDialogResponse($message, false);
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param  int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendResponse(false , __('messages.not_found', ['model' => __('models/reports.singular')]));
        }

        $this->reportRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/reports.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}