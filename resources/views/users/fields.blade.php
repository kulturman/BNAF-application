<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email ou nom d\'utilisateur:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class = "form-error-message"></strong>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role') !!}
    <select class="form-control" name="role_id" id="role_id" required>
        <option value="">Choisir le rôle</option>
        @foreach($roles as $role)
            <option @if (isset($user) && $role->id === $user->role_id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <strong class = "form-error-message"></strong>
</div>

