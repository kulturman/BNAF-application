<!-- Localite Field -->
<tr>
    <th>
        {!! Form::label('agent_code', 'Code agent:') !!}
    </th>
    <td>
        <p>{{ $report->agent_code }}</p>
    </td>
</tr>

<tr>
    <th>
        {!! Form::label('owner_id', 'Inputé à:') !!}
    </th>
    <td>
        <p>{{ $report->owner !== null ? $report->owner->name : '' }}</p>
    </td>
</tr>

<tr>
    <th>
        {!! Form::label('created_at', 'Date de soumission:') !!}
    </th>
    <td>
        <p>{{ $report->created_at->format('d/m/Y H:i') }}</p>
    </td>
</tr>

<tr>
    <th>
        {!! Form::label('localite', __('models/reports.fields.localite').':') !!}
    </th>
    <td>
        <p>{{ $report->localite }}</p>
    </td>
</tr>

<tr>
    <th>
        {!! Form::label('photo', 'Images:') !!}
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

<tr>
    <th>
        {!! Form::label('photo', 'Fichier vocal:') !!}
    </th>
    <td>
        <p>
            @if(isset($report->audio))
                <audio controls>
                    <source src="{{ asset($report->audio) }}">
                </audio>
            @endif
        </p>
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


<!-- Text Field -->
<tr>
    <th>
        {!! Form::label('text', __('models/reports.fields.text').':') !!}
    </th>
    <td>
        <p>{!!  $report->text !!}</p>
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


<!-- Nip Field -->
<tr>
    <th>
        {!! Form::label('nip', __('models/reports.fields.nip').':') !!}
    </th>
    <td>
        <p>{{ $report->nip }}</p>
    </td>
</tr>


<!-- Region Field -->
<tr>
    <th>
        {!! Form::label('region', __('models/reports.fields.region').':') !!}
    </th>
    <td>
        <p>{{ $report->region }}</p>
    </td>
</tr>


<!-- Province Field -->
<tr>
    <th>
        {!! Form::label('province', __('models/reports.fields.province').':') !!}
    </th>
    <td>
        <p>{{ $report->province }}</p>
    </td>
</tr>


<!-- Commune Field -->
<tr>
    <th>
        {!! Form::label('commune', __('models/reports.fields.commune').':') !!}
    </th>
    <td>
        <p>{{ $report->commune }}</p>
    </td>
</tr>


