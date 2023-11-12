@extends('layouts.app')

@section('title')
Changement de mot de passe
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">
    <a>Changement de mot de passe</a>
</li>
@endsection

@section('content')
<section class="content-header">
    <h1>Changer mot de passe</h1>
</section>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <strong>Changer mot de passe</strong>
        </div>
        <div class="card-body">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'change-password', 'route' => 'users.change-password', 'class' => 'row g-3
                    main-form']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('current_password', 'Mot de passe actuel:') !!}
                        {!! Form::password('current_password', ['class' => 'form-control','maxlength' => 255,'maxlength'
                        => 255]) !!}
                        <strong class="form-error-message"></strong>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('new_password', 'Nouveau mot de passe:') !!}
                        {!! Form::password('new_password', ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                        255]) !!}
                        <strong class="form-error-message"></strong>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('new_password_confirmation', 'Confirmation nouveau mot de passe:') !!}
                        {!! Form::password('new_password_confirmation', ['class' => 'form-control','maxlength' =>
                        255,'maxlength' => 255]) !!}
                        <strong class="form-error-message"></strong>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
