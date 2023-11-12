<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Créer un @lang('models/users.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'usersCreateForm', 'route' => 'users.store', 'class' => 'row g-3 main-form']) !!}
                    @include('users.fields')
                    <div class="form-group col-sm-6">
                        {!! Form::label('password', 'Mot de passe:') !!}
                        {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        <strong class = "form-error-message"></strong>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password_confirmation', 'Confirmer le mot de passe:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        <strong class = "form-error-message"></strong>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('agent_code', 'Code agent:') !!}
                        {!! Form::text('agent_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        <strong class = "form-error-message"></strong>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', 'Numéro de téléphone:') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        <strong class = "form-error-message"></strong>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
                        <a data-coreui-dismiss="modal" class="btn btn-danger">
                            Annuler
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
