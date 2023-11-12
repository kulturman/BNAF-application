<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', __('models/flashInfos.fields.content').':') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('flashInfos.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
