<?php

namespace App\DataTables;

use App\Models\SiteConfig;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SiteConfigDataTable extends DataTable
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
                ->rawColumns(['director_photo', 'action'])
                ->addColumn('action', function ($row) {
                    return view('site_configs.datatables_actions')->with('id', $row->id)->with('model', $row)->render();
                })
                ->addColumn('director_photo', function ($row) {
                    return view('partials.row-thumbnail')->with('url', url($row->director_photo));
                });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SiteConfig $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SiteConfig $model)
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
            'director_word' => new Column(['title' => __('models/siteConfigs.fields.director_word'), 'data' => 'director_word']),
            'director_photo' => new Column(['title' => __('models/siteConfigs.fields.director_photo'), 'data' => 'director_photo']),
            'director_name' => new Column(['title' => __('models/siteConfigs.fields.director_name'), 'data' => 'director_name']),
            'phone' => new Column(['title' => __('models/siteConfigs.fields.phone'), 'data' => 'phone']),
            'email' => new Column(['title' => __('models/siteConfigs.fields.email'), 'data' => 'email']),
            'address' => new Column(['title' => __('models/siteConfigs.fields.address'), 'data' => 'address']),
            'facebook' => new Column(['title' => __('models/siteConfigs.fields.facebook'), 'data' => 'facebook']),
            'linkedin' => new Column(['title' => __('models/siteConfigs.fields.linkedin'), 'data' => 'linkedin']),
            'twitter' => new Column(['title' => __('models/siteConfigs.fields.twitter'), 'data' => 'twitter']),
            'youtube' => new Column(['title' => __('models/siteConfigs.fields.youtube'), 'data' => 'youtube'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'site_configs_datatable_' . time();
    }
}
