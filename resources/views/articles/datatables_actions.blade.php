<div class='btn-group'>
    <a title="Détails" href="{{ route('articles.show', $id) }}" class='btn btn-ghost-success dt-actions-btn'>
        <i class="fa fa-eye"></i>
    </a>
    <a title="Editer" tooltip='Editer' href="{{ route('articles.edit', $id) }}"
       class='btn btn-ghost-info dt-actions-btn'>
        <i class="fa fa-edit"></i>
    </a>
    <a title="Supprimer" class="btn btn-ghost-danger delete-btn data-tooltip delete-btn" data-tooltip="Supprimer"
       href="{{ route('articles.destroy', $id) }}">
        <i class="fa fa-trash"></i>
    </a>
</div>
