<div class='btn-group'>
    <a title="Editer" tooltip='Editer' href="{{ route('slides.edit', $id) }}" class='btn btn-ghost-info dt-actions-btn'>
        <i class="fa fa-edit"></i>
    </a>
    <a title="Supprimer" class="btn btn-ghost-danger delete-btn data-tooltip delete-btn" data-tooltip="Supprimer"
       href="{{ route('slides.destroy', $id) }}">
        <i class="fa fa-trash"></i>
    </a>
</div>
