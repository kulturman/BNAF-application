<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ArticleDataTable extends DataTable
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
                ->addColumn('cover_image', function ($row) {
                    return view('partials.row-thumbnail')->with('url', url($row->cover_image));
                })
                ->addColumn('content', function ($row) {
                    return getArticleContentPreview($row->content, 300);
                })
                ->addColumn('action', function ($row) {
                    return view('articles.datatables_actions')->with('id', $row->id)->with('model', $row)->render();
                })
                ->addColumn('action', 'articles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Article $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Article $model)
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
            'title' => new Column(['title' => __('models/articles.fields.title'), 'data' => 'title']),
            'content' => new Column(['title' => __('models/articles.fields.content'), 'data' => 'content']),
            'cover_image' => new Column(['title' => __('models/articles.fields.cover_image'), 'data' => 'cover_image'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'articles_datatable_' . time();
    }
}
