<tr>
    <th>
        {!! Form::label('email', "Nom complet:") !!}
    </th>
    <td>
        <p>{{ $user->name }}</p>
    </td>
</tr>

<tr>
    <th>
        {!! Form::label('email', 'Email:') !!}
    </th>
    <td>
        <p>{{ $user->email }}</p>
    </td>
</tr>
