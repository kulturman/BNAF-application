<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Repositories\ReportRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

    public function create()
    {
        return view('reports.create');
    }

    public function validateReport(Report $report) {
        $report->validated = true;

        $data = [
            'created_at' => $report->created_at,
            'validated_at' => $report->updated_at,
            'latitude' => $report->latitude,
            'longitude' => $report->longitude,
            'photo' => $report->photo ? base64_encode(file_get_contents(public_path($report->photo))): null,
            'secondPhoto' => $report->photoInput ? base64_encode(file_get_contents(public_path($report->photoInput))): null,
            'repere' => $report->repere,
            'structure' => $report->structure,
            'text' => $report->text
        ];

        Http::post(env('BNAF_SYSTEM_URL'), $data);
        $report->save();

        return $this->sendSuccessDialogResponse('Alerte validée avec succès');
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

        if (isset($inputs['audio'])) {
            $filename = 'public/uploads/' .sha1(mktime()) . '.wav';
            Storage::disk('local')->put(
                $filename
                , $inputs['audio']
            );
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
