@extends('frontend.layout')

@section('styles')
    @parent
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('frontend/css/form.css') }}">
@endsection

@section('content')
    <section class="wf100 subheader">
        <div class="container">
            <h2>Dénonciation</h2>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Accueil</a>
                </li>
                <li> Dénoncer un cas suspect </li>
            </ul>
        </div>
    </section>

    <div class="main-content p80">
        <div class="col-12">
            <div class="mb-4" style="padding: 0 50px">
                <div class="alert alert-block alert-success">
                    <ul style="line-height: 3">
                        <li>Les données consignées au sein de ce formulaire revêtent un caractère confidentiel, et leur accès sera restreint exclusivement aux membres actifs de la BNAF.</li>
                        <li>Conformément à la législation en vigueur, il vous est possible de bénéficier d'une indemnisation dans le cas où les informations fournies se révèlent pertinentes.</li>
                    </ul>
                </div>

                <div class="form-relevance-data form-irrelevant alert alert-block alert-danger">
                    Votre formulaire contient très peu d'informations et ne sera probablement pris en compte
                </div>

                <div
                    style="display: none"
                    class="form-relevance-data form-relevant alert alert-block alert-success">
                    Votre formulaire a de grandes chances d'être pertinent
                </div>

                <div>
                    <div class="rounded-bottom">
                        {!! Form::open(['id' => 'reportsCreateForm', 'enctype' => "multipart/form-data", 'route' => 'reports.store', 'files' => true, 'class' => 'row g-3 main-form']) !!}

                        <!-- Canvas to display the captured photo -->
                        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
                        <div class="form-group col-sm-12">
                            {!! Form::label('agent_code', "Code de votre contact à la BNAF") !!}
                            {!! Form::text('agent_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('region', 'Région:') !!}
                            <select name="region" id="region" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('province', 'Province:') !!}
                            <select name="province" id="province" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('commune', 'Commune:') !!}
                            <select name="commune" id="commune" class="form-control select2">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('localite', 'Secteur / Localité:') !!}
                            {!! Form::text('localite', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <div class="form-group col-sm-12 recording-block">
                            <button class="btn btn-primary" type="button" id="startRecording">Enregistrer un vocal</button>
                            <span id="recordingIndicator" class="hidden">Enregistrement...</span>
                            <button class="btn btn-danger hidden" type="button" id="stopRecording">Arrêter l'enregistrement</button>
                            <audio class="hidden" id="audioPlayer" controls></audio>
                            <button class="btn btn-danger hidden" type="button" id="deleteRecording">Supprimer l'enregistrement</button>
                        </div>

                        <!-- Structure Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('structure', 'Surnom / nom de la struture en cause:') !!}
                            {!! Form::text('structure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <!-- Repere Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('repere', __('models/reports.fields.repere').':') !!}
                            {!! Form::text('repere', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('nip', 'Numéro NIP de la CNIB (17 chiffres):') !!}
                            {!! Form::text('nip', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <!-- Photo Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('photo', __('models/reports.fields.photo').':') !!}
                            <input type="file" name="photo" id="photo" class="form-control file" />
                            <strong class = "form-error-message"></strong>
                            @if(isset($report) && $report->photo)
                                <img class="thumbnail" src="{{ asset($report->photo) }}" alt="Image">
                            @endif
                        </div>

                        <div class="form-group col-sm-6" style="margin-top: 22px">
                            <button class="btn btn-primary" type="button" id="startButton">Utiliser votre appareil photo</button>
                            <button class="btn-primary btn" type="button"  id="captureButton" style="display:none;">Capturer la photo</button>
                        </div>

                        <div class="form-group col-sm-12">
                            <video id="video" style="width: 100%;display: none" autoplay></video>
                        </div>

                        <!-- Text Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('text', 'Message:') !!}
                            {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <input name="photoInput" type="hidden" class="form-variable" id="photoInput"/>
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
                            <a href="{{ route('frontend.index') }}" class="btn btn-danger">
                                Annuler
                            </a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        const startRecordingButton = document.getElementById('startRecording');
        const stopRecordingButton = document.getElementById('stopRecording');
        const deleteRecordingButton = document.getElementById('deleteRecording');
        const recordingIndicator = document.getElementById('recordingIndicator');
        const audioPlayer = document.getElementById('audioPlayer');
        let mediaRecorder;
        let audioChunks = [];
        let audioBlob;
        let formVariables;

        startRecordingButton.addEventListener('click', startRecording);
        stopRecordingButton.addEventListener('click', stopRecording);
        deleteRecordingButton.addEventListener('click', e => {
            e.preventDefault();
            audioBlob = null;
            hide(audioPlayer);
            show(startRecordingButton);
            hide(deleteRecordingButton)
        });

        function startRecording() {
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.ondataavailable = event => {
                        if (event.data.size > 0) {
                            audioChunks.push(event.data);
                        }
                    };

                    mediaRecorder.onstop = () => {
                        audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                        audioPlayer.src = URL.createObjectURL(audioBlob);

                        /*const formData = new FormData();
                        formData.append('audio', audioBlob);*/
                        hide(recordingIndicator);
                        show(audioPlayer);

                        formVariables = [{name: 'audio', data: audioBlob}];
                    };

                    mediaRecorder.start();
                    hide(startRecordingButton);
                    show(stopRecordingButton);
                    show(recordingIndicator);

                })
                .catch(error => console.error('Error accessing microphone:', error));
        }

        function show(element) {
            element.classList.remove('hidden');
        }

        function hide(element) {
            element.classList.add('hidden');
        }

        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                mediaRecorder.stop();
                hide(stopRecordingButton);
                show(deleteRecordingButton);
            }
        }

    </script>
    {!! Html::script('js/sweetalert2.all.min.js') !!}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="{{ url('frontend/js/form.js') }}"></script>
@endsection