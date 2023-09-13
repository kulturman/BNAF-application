<!-- Localite Field -->
<tr>
    <th>
        {!! Form::label('localite', 'Date de soumission:') !!}
    </th>
    <td>
        <p>{{ $report->created_at->format('d/m/Y H:i') }}</p>
    </td>
</tr>

<!-- Localite Field -->
<tr>
    <th>
        {!! Form::label('localite', __('models/reports.fields.localite').':') !!}
    </th>
    <td>
        <p>{{ $report->localite }}</p>
    </td>
</tr>


<!-- Structure Field -->
<tr>
    <th>
        {!! Form::label('structure', __('models/reports.fields.structure').':') !!}
    </th>
    <td>
        <p>{{ $report->structure }}</p>
    </td>
</tr>


<!-- Photo Field -->
<tr>
    <th>
        {!! Form::label('photo', __('models/reports.fields.photo').':') !!}
    </th>
    <td>
        <p>
            @if(isset($report->photo))
                <img class="thumbnail" src="{{ asset($report->photo)}}" alt="Photo">
            @endif

            @if(isset($report->photoInput))
                <img class="thumbnail" src="{{ asset($report->photoInput)}}" alt="Photo">
            @endif
        </p>
    </td>
</tr>


<!-- Text Field -->
<tr>
    <th>
        {!! Form::label('text', __('models/reports.fields.text').':') !!}
    </th>
    <td>
        <p>{!! $report->text !!}</p>
    </td>
</tr>


<!-- Repere Field -->
<tr>
    <th>
        {!! Form::label('repere', __('models/reports.fields.repere').':') !!}
    </th>
    <td>
        <p>{{ $report->repere }}</p>
    </td>
</tr>


<!-- Longitude Field -->
<tr>
    <th>
        {!! Form::label('longitude', __('models/reports.fields.longitude').':') !!}
    </th>
    <td>
        <p>{{ $report->longitude }}</p>
    </td>
</tr>


<!-- Latitude Field -->
<tr>
    <th>
        {!! Form::label('latitude', __('models/reports.fields.latitude').':') !!}
    </th>
    <td>
        <p>{{ $report->latitude }}</p>
    </td>
</tr>


