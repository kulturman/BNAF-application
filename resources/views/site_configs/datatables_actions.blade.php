<div class='btn-group'>
    <a title="Détails" href="{{ route('siteConfigs.show', $id) }}" class='btn btn-ghost-success dt-actions-btn'>
       <i class="fa fa-eye"></i>
    </a>
    <a title="Editer" tooltip = 'Editer' href="{{ route('siteConfigs.edit', $id) }}" class='btn btn-ghost-info dt-actions-btn'>
       <i class="fa fa-edit"></i>
    </a>
    <a title="Supprimer" class = "btn btn-ghost-danger delete-btn data-tooltip delete-btn" data-tooltip="Supprimer" href="{{ route('siteConfigs.destroy', $id) }}">
        <i class="fa fa-trash"></i>
    </a>
</div>
