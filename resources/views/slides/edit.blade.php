<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/slides.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($slide, ['id' => 'slidesUpdateForm', 'enctype' => "multipart/form-data", 'route' => ['slides.update', $slide->id], 'method' => 'patch', 'files' => true, 'class' => 'row g-3 main-form']) !!}
                       <input name = "id" type = "text" value = "{{ $slide->id }}" class = "hidden-field"/>
                       @include('slides.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
