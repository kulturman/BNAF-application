<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Détails @lang('models/reports.singular')</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>

<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            @include('reports.show_fields')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
