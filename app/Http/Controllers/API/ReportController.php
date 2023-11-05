<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportRequest;
use App\Http\UseCases\CreateReport;

class ReportController extends AppBaseController
{
    private CreateReport  $createReport;

    public function __construct(CreateReport $createReport)
    {
        $this->createReport = $createReport;
    }


    public function store(CreateReportRequest $request) {
        $this->createReport->handle($request);

        return response()->json(['message' => 'Alerte enregistrée avec succès, merci pour votre contribution']);
    }
}
