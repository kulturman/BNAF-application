<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportRequest;
use App\Http\Resources\ReportResource;
use App\Http\UseCases\CreateReport;
use App\Models\Report;
use App\Repositories\ReportRepository;

class ReportController extends AppBaseController
{
    private CreateReport  $createReport;
    private ReportRepository $reportRepository;

    public function __construct(
        CreateReport $createReport,
        ReportRepository $reportRepository
    )
    {
        $this->createReport = $createReport;
        $this->reportRepository = $reportRepository;
    }


    public function store(CreateReportRequest $request) {
        $this->createReport->handle($request);

        return response()->json(['message' => 'Alerte enregistrée avec succès, merci pour votre contribution']);
    }

    public function myReports() {
        return ReportResource::collection($this->reportRepository->getUserAssignedReports(auth()->user()->id));
    }

    public function getReport(Report $report)
    {
        return new ReportResource($report);
    }

    public function getAudio(Report $report) {
        return [
            'audio' => base64_encode(file_get_contents($report->audio))
        ];
    }
}
