<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/siteConfigs.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($siteConfig, ['id' => 'siteConfigsUpdateForm', 'enctype' => "multipart/form-data", 'route' => ['siteConfigs.update', $siteConfig->id], 'method' => 'patch', 'files' => true, 'class' => 'row g-3 main-form']) !!}
                       <input name = "id" type = "text" value = "{{ $siteConfig->id }}" class = "hidden-field"/>
                       @include('site_configs.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( 'textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>