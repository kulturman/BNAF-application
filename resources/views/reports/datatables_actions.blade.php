<div class='btn-group'>
    <a data-message="Voulez vous valider cette alerte" data-method="POST" title="Valider" href="{{ route('reports.validate', $id) }}" class='ajax-button btn btn-ghost-success'>
        <i class="fa fa-check"></i>
    </a>
    <a title="Détails" href="{{ route('reports.show', $id) }}" class='btn btn-ghost-success dt-actions-btn'>
       <i class="fa fa-eye"></i>
    </a>
    <a title="Supprimer" class = "btn btn-ghost-danger delete-btn data-tooltip delete-btn" data-tooltip="Supprimer" href="{{ route('reports.destroy', $id) }}">
        <i class="fa fa-trash"></i>
    </a>
</div>
