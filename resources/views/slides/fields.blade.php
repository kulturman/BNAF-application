<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', __('models/slides.fields.text').':') !!}
    {!! Form::text('text', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/slides.fields.image').':') !!}
    <input type="file" name="image" id="image" class="form-control file"/>
    <strong class="form-error-message"></strong>
    @if(isset($slide) && $slide->image)
    <img class="thumbnail" src="{{ asset($slide->image) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', __('models/slides.fields.order').':') !!}
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('slides.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
