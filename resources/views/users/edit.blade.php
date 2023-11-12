<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/users.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($user, ['id' => 'users', 'route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'row g-3 main-form']) !!}
                    <input name = "id" type = "text" value = "{{ $user->id }}" class = "hidden-field"/>
                    @include('users.fields')
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
