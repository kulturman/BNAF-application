<?php

namespace App\DataTables;

use App\Models\Report;
use App\Repositories\ReportRepository;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ReportDataTable extends DataTable
{
    private ReportRepository $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable
            ->addColumn('owner_id', fn($row) => $row->owner ? $row->owner->name : '')
            ->addColumn('created_at', fn($row) => $row->created_at->format('d/m/Y H:i'))
            ->addColumn('action', function ($row) {
                return view('reports.datatables_actions')->with('id', $row->id)->with('model', $row)->render();
            })
            ->addColumn('action', 'reports.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Report $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Report $model)
    {
        return $this->reportRepository->getCurrentUserViewableReports();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(customUrl(request()->path()))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions'])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-primary',],
                    ['extend' => 'export', 'className' => 'btn btn-default',],
                    ['extend' => 'print', 'className' => 'btn btn-success',],
                    ['extend' => 'reset', 'className' => 'btn btn-danger',]
                ],
                'language' => [
                    'url' => url('https://cdn.datatables.net/plug-ins/1.10.12/i18n/French.json'),
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'created_at' => new Column(['title' => "Date de soumission", 'data' => 'created_at']),
            'score' => new Column(['title' => "Score", 'data' => 'score']),
            'owner_id' => new Column(['title' => "Inputé à", 'data' => 'owner_id']),
            'localite' => new Column(['title' => __('models/reports.fields.localite'), 'data' => 'localite']),
            'structure' => new Column(['title' => __('models/reports.fields.structure'), 'data' => 'structure']),
            'repere' => new Column(['title' => __('models/reports.fields.repere'), 'data' => 'repere']),
            'region' => new Column(['title' => __('models/reports.fields.region'), 'data' => 'region']),
            'province' => new Column(['title' => __('models/reports.fields.province'), 'data' => 'province']),
            'commune' => new Column(['title' => __('models/reports.fields.commune'), 'data' => 'commune'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'reports_datatable_' . time();
    }
}
