<!-- Title Field -->
<tr>
    <th>
        {!! Form::label('title', __('models/articles.fields.title').':') !!}
    </th>
    <td>
        <p>{{ $article->title }}</p>
    </td>
</tr>


<!-- Content Field -->
<tr>
    <th>
        {!! Form::label('content', __('models/articles.fields.content').':') !!}
    </th>
    <td>
        <p>{!! $article->content !!}</p>
    </td>
</tr>


<!-- Cover Image Field -->
<tr>
    <th>
        {!! Form::label('cover_image', __('models/articles.fields.cover_image').':') !!}
    </th>
    <td>
        <p><img class="thumbnail" src="{{ asset($article->cover_image) }}" alt=""></p>
    </td>
</tr>


