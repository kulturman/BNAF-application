<!-- Chiffres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chiffres', __('models/stats.fields.chiffres').':') !!}
    {!! Form::text('chiffres', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', __('models/stats.fields.text').':') !!}
    {!! Form::text('text', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', __('models/stats.fields.icon').':') !!}
    {!! Form::text('icon', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('stats.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
