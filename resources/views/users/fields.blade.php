<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email ou nom d\'utilisateur:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>
