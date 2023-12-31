<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Editer un @lang('models/articles.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div>
            <div class="rounded-bottom">
                {!! Form::model($article, ['id' => 'articlesUpdateForm', 'enctype' => "multipart/form-data", 'route' =>
                ['articles.update', $article->id], 'method' => 'patch', 'files' => true, 'class' => 'row g-3
                main-form']) !!}
                <input name="id" type="text" value="{{ $article->id }}" class="hidden-field"/>
                @include('articles.fields')
                {!! Form::close() !!}
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