<?php

namespace App\Http\Controllers;

use App\DataTables\MyReportsDataTable;
use App\DataTables\ReportDataTable;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\UseCases\CreateReport;
use App\Models\Report;
use App\Repositories\ReportRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ReportController extends AppBaseController
{
    private ReportRepository $reportRepository;
    private UserRepository $userRepository;
    private CreateReport $createReport;

    public function __construct(
        ReportRepository $reportRepo,
        UserRepository   $userRepository,
        CreateReport     $createReport
    )
    {
        $this->reportRepository = $reportRepo;
        $this->middleware(['auth'])->except('store');
        $this->userRepository = $userRepository;
        $this->createReport = $createReport;
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

    public function myReports(MyReportsDataTable $reportDataTable)
    {
        return $reportDataTable->render('reports.me');
    }

    public function create()
    {
        return view('reports.create');
    }

    public function validateReport(Report $report)
    {
        $report->validated = true;

        $data = [
            'created_at' => $report->created_at,
            'validated_at' => $report->updated_at,
            'latitude' => $report->latitude,
            'longitude' => $report->longitude,
            'photo' => $report->photo ? base64_encode(file_get_contents(public_path($report->photo))) : null,
            'secondPhoto' => $report->photoInput ? base64_encode(file_get_contents(public_path($report->photoInput))) : null,
            'repere' => $report->repere,
            'structure' => $report->structure,
            'text' => $report->text
        ];

        Http::post(env('BNAF_SYSTEM_URL'), $data);
        $report->save();

        return $this->sendSuccessDialogResponse('Alerte validée avec succès');
    }

    public function assign(Report $report, Request $request)
    {
        if ($request->isMethod('GET')) {
            $users = $this->userRepository->all();
            return view('reports.assign', compact('report', 'users'));
        }
        $report->owner_id = $request->input('user_id');
        $report->save();

        return $this->sendSuccessDialogResponse("Alerte inmputés avec succès");
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
        $this->createReport->handle($request);
        $message = 'Alerte enregistrée avec succès, merci pour votre contribution';
        return $this->sendSuccessDialogResponse($message, true, route('frontend.form'));
    }

    /**
     * Display the specified Report.
     *
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     * @param UpdateReportRequest $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/reports.singular')]));
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
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendResponse(false, __('messages.not_found', ['model' => __('models/reports.singular')]));
        }

        $this->reportRepository->delete($id);
        $message = __('messages.deleted', ['model' => __('models/reports.singular')]);
        return $this->sendSuccessDialogResponse($message);
    }
}
