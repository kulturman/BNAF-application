<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/reports.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($report, ['id' => 'reportsUpdateForm', 'enctype' => "multipart/form-data", 'route' => ['reports.update', $report->id], 'method' => 'patch', 'files' => true, 'class' => 'row g-3 main-form']) !!}
                       <input name = "id" type = "text" value = "{{ $report->id }}" class = "hidden-field"/>
                       @include('reports.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
