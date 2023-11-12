<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Créer un @lang('models/articles.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'articlesCreateForm', 'enctype' => "multipart/form-data", 'route' =>
                    'articles.store', 'files' => true, 'class' => 'row g-3 main-form']) !!}
                    @include('articles.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('textarea'))
        .then(() => {
            document.querySelector('.ck-editor__editable').style.height = '200px'
        })
        .catch(error => {
            console.error(error);
        });
</script>