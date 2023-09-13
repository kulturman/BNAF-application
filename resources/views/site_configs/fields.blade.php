<!-- Director Word Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('director_word', __('models/siteConfigs.fields.director_word').':') !!}
    {!! Form::textarea('director_word', null, ['class' => 'form-control']) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Director Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('director_photo', __('models/siteConfigs.fields.director_photo').':') !!}
    <input type="file" name="director_photo" id="director_photo" class="form-control file" />
    @if(isset($siteConfig) && $siteConfig->director_photo)
        <img class="thumbnail" src="{{ asset($siteConfig->director_photo) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Director Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('director_name', __('models/siteConfigs.fields.director_name').':') !!}
    {!! Form::text('director_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/siteConfigs.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/siteConfigs.fields.email').':') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/siteConfigs.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Facebook Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook', __('models/siteConfigs.fields.facebook').':') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Linkedin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin', __('models/siteConfigs.fields.linkedin').':') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Twitter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter', __('models/siteConfigs.fields.twitter').':') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Youtube Field -->
<div class="form-group col-sm-6">
    {!! Form::label('youtube', __('models/siteConfigs.fields.youtube').':') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('siteConfigs.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
