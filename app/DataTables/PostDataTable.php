<?php

namespace App\DataTables;

use App\Models\Post;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PostDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('image', function ($data) {
            $imagePath = asset('storage/images/' . $data->image);
            return '<img src="' . $imagePath . '" width="80" height="80"/>';
            })
            ->addColumn('action',
                function($row){
                    $actionBtn =
                    '<form action="'.route("delete", $row->id).'" method="post">
                    <a class="btn btn-success" href="'.route("getvalue-update-post", $row->id).'">Update</a>
                    '.csrf_field().'
                    '.method_field('post').'
                    <button type="submit" class=" btn btn-danger">Delete</button>
                    ';
                    return $actionBtn;
                }
            )
            ->addColumn('content', function($data){
                return $data->content;
            })
            ->setRowId('id')
            ->rawColumns(['image', 'action', 'content']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('post-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns():array
    {
        return [
            // Column::make('id'),
            Column::make('title'),
            Column::make('is_featured'),
            Column::make('status'),
            Column::make('image'),
            Column::make('excerpt'),
            Column::make('content'),
            Column::make('created_at')->title('posted_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Post_' . date('YmdHis');
    }
}
