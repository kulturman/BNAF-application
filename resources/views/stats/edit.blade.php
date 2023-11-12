<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/stats.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($stat, ['id' => 'statsUpdateForm', 'enctype' => "multipart/form-data", 'route' =>
                ['stats.update', $stat->id], 'method' => 'patch', 'class' => 'row g-3 main-form']) !!}
                <input name="id" type="text" value="{{ $stat->id }}" class="hidden-field"/>
                @include('stats.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
