<!-- Localite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localite', __('models/reports.fields.localite').':') !!}
    {!! Form::text('localite', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Validated Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validated', __('models/reports.fields.validated').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('validated', 0) !!}
        {!! Form::checkbox('validated', '1', null) !!}
    </label>
</div>


<!-- Structure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('structure', __('models/reports.fields.structure').':') !!}
    {!! Form::text('structure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/reports.fields.photo').':') !!}
    <input type="file" name="photo" id="photo" class="form-control file"/>
    <strong class="form-error-message"></strong>
    @if(isset($report) && $report->photo)
    <img class="thumbnail" src="{{ asset($report->photo) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Photoinput Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photoInput', __('models/reports.fields.photoInput').':') !!}
    <input type="file" name="photoInput" id="photoInput" class="form-control file"/>
    <strong class="form-error-message"></strong>
    @if(isset($report) && $report->photoInput)
    <img class="thumbnail" src="{{ asset($report->photoInput) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', __('models/reports.fields.text').':') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Repere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repere', __('models/reports.fields.repere').':') !!}
    {!! Form::text('repere', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Nip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nip', __('models/reports.fields.nip').':') !!}
    {!! Form::text('nip', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Region Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region', __('models/reports.fields.region').':') !!}
    {!! Form::text('region', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Province Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province', __('models/reports.fields.province').':') !!}
    {!! Form::text('province', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Commune Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commune', __('models/reports.fields.commune').':') !!}
    {!! Form::text('commune', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('reports.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
