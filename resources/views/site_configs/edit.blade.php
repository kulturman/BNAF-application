<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer @lang('models/siteConfigs.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($siteConfig, ['id' => 'siteConfigsUpdateForm', 'route' => ['siteConfigs.update', $siteConfig->id], 'method' => 'patch', 'class' => 'row g-3 main-form']) !!}
                       <input name = "id" type = "text" value = "{{ $siteConfig->id }}" class = "hidden-field"/>
                       @include('site_configs.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
