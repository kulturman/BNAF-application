<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Créer un @lang('models/siteConfigs.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'siteConfigsCreateForm', 'enctype' => "multipart/form-data", 'route' =>
                    'siteConfigs.store', 'files' => true, 'class' => 'row g-3 main-form']) !!}
                    @include('site_configs.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>