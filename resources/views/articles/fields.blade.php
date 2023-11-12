<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/articles.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', __('models/articles.fields.content').':') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    <strong class="form-error-message"></strong>
</div>


<!-- Cover Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover_image', __('models/articles.fields.cover_image').':') !!}
    <input type="file" name="cover_image" id="cover_image" class="form-control file"/>
    <strong class="form-error-message"></strong>
    @if(isset($article) && $article->cover_image)
    <img class="thumbnail" src="{{ asset($article->cover_image) }}" alt="Image">
    @endif
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
    <a data-coreui-dismiss="modal" href="{{ route('articles.index') }}" class="btn btn-danger">
        Annuler
    </a>
</div>
