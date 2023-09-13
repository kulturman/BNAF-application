<!-- Localite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localite', __('models/reports.fields.localite').':') !!}
    {!! Form::text('localite', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Structure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('structure', __('models/reports.fields.structure').':') !!}
    {!! Form::text('structure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/reports.fields.photo').':') !!}
    <input type="file" name="photo" id="photo" class="form-control file" />
    <strong class = "form-error-message"></strong>
    @if(isset($report) && $report->photo)
        <img class="thumbnail" src="{{ asset($report->photo) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', __('models/reports.fields.text').':') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Repere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repere', __('models/reports.fields.repere').':') !!}
    {!! Form::text('repere', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', __('models/reports.fields.longitude').':') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', __('models/reports.fields.latitude').':') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('reports.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
