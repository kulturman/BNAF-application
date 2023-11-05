<div class='btn-group'>
    <a data-message="Voulez vous valider cette alerte" data-method="POST" title="Valider" href="{{ route('reports.validate', $id) }}" class='ajax-button btn btn-ghost-success'>
        <i class="fa fa-check"></i>
    </a>
    <a title="Détails" href="{{ route('reports.show', $id) }}" class='btn btn-ghost-success dt-actions-btn'>
       <i class="fa fa-eye"></i>
    </a>
</div>
