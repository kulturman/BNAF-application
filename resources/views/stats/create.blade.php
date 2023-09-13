<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Créer un @lang('models/stats.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'statsCreateForm', 'enctype' => "multipart/form-data", 'route' => 'stats.store', 'class' => 'row g-3 main-form']) !!}
                           @include('stats.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
