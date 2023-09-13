<?php

namespace App\DataTables;

use App\Models\Stat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class StatDataTable extends DataTable
{
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
                ->rawColumns(['action', 'icon'])
                ->addColumn('icon', fn ($row) => $row->icon)
                ->addColumn('action', function ($row) {
                    return view('stats.datatables_actions')->with('id', $row->id)->with('model', $row)->render();
                })
                ->addColumn('action', 'stats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Stat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stat $model)
    {
        return $model->newQuery();
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
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Actions'])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
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
            'chiffres' => new Column(['title' => __('models/stats.fields.chiffres'), 'data' => 'chiffres']),
            'text' => new Column(['title' => __('models/stats.fields.text'), 'data' => 'text']),
            'icon' => new Column(['title' => __('models/stats.fields.icon'), 'data' => 'icon'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stats_datatable_' . time();
    }
}
