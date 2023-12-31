<?php

namespace App\DataTables;

use App\Models\Slide;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SlideDataTable extends DataTable
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
            ->addColumn('image', function ($row) {
                return view('partials.row-thumbnail')->with('url', url($row->image));
            })
            ->addColumn('action', function ($row) {
                return view('slides.datatables_actions')->with('id', $row->id)->with('model', $row)->render();
            })
            ->addColumn('action', 'slides.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slide $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slide $model)
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
            'text' => new Column(['title' => __('models/slides.fields.text'), 'data' => 'text']),
            'image' => new Column(['title' => __('models/slides.fields.image'), 'data' => 'image']),
            'order' => new Column(['title' => __('models/slides.fields.order'), 'data' => 'order'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'slides_datatable_' . time();
    }
}
