<!-- Chiffres Field -->
<tr>
    <th>
        {!! Form::label('chiffres', __('models/stats.fields.chiffres').':') !!}
    </th>
    <td>
        <p>{{ $stat->chiffres }}</p>
    </td>
</tr>


<!-- Text Field -->
<tr>
    <th>
        {!! Form::label('text', __('models/stats.fields.text').':') !!}
    </th>
    <td>
        <p>{{ $stat->text }}</p>
    </td>
</tr>


<!-- Icon Field -->
<tr>
    <th>
        {!! Form::label('icon', __('models/stats.fields.icon').':') !!}
    </th>
    <td>
        <p>{{ $stat->icon }}</p>
    </td>
</tr>


