<div class='btn-group'>
    <a title="Détails" href="{{ route('users.show', $id) }}" class='btn btn-ghost-success  dt-actions-btn'>
       <i class="fa fa-eye"></i>
    </a>
    <a title="Editer" tooltip = 'Editer' href="{{ route('users.edit', $id) }}" class='btn btn-ghost-info  dt-actions-btn'>
       <i class="fa fa-edit"></i>
    </a>
    <a title="Supprimer" class = "btn btn-ghost-danger delete-btn data-tooltip delete-btn" data-tooltip="Supprimer" href="{{ route('users.destroy', $id) }}">
        <i class="fa fa-trash"></i>
    </a>
    <a title="Réinitiliaser le mot de passe" class = "btn btn ajax-confirmation-button" data-tooltip="Réinitialiser mot de passe" href="{{ route('users.reset-password', $id) }}">
        <i class="fa fa-recycle"></i>
    </a>
</div>
