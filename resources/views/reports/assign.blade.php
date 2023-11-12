<div class="modal-header">
    <h5 class="modal-title" id="crudModal">Inputer l'alerte</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
    <div class="col-12">
        <div class="mb-4">
            <div>
                <div class="rounded-bottom">
                    {!! Form::open(['id' => 'assignForm', 'enctype' => "multipart/form-data", 'route' => ['reports.assign', $report->id], 'files' => true, 'class' => 'row g-3 main-form']) !!}
                        <div class="form-group col-sm-6">
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Valider', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
