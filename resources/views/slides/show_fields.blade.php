<!-- Text Field -->
<tr>
    <th>
        {!! Form::label('text', __('models/slides.fields.text').':') !!}
    </th>
    <td>
        <p>{{ $slide->text }}</p>
    </td>
</tr>


<!-- Image Field -->
<tr>
    <th>
        {!! Form::label('image', __('models/slides.fields.image').':') !!}
    </th>
    <td>
        <p>{{ $slide->image }}</p>
    </td>
</tr>


<!-- Order Field -->
<tr>
    <th>
        {!! Form::label('order', __('models/slides.fields.order').':') !!}
    </th>
    <td>
        <p>{{ $slide->order }}</p>
    </td>
</tr>


