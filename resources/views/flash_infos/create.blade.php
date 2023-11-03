<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Créer un @lang('models/flashInfos.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'flashInfosCreateForm', 'enctype' => "multipart/form-data", 'route' => 'flashInfos.store', 'class' => 'row g-3 main-form']) !!}
                           @include('flash_infos.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>