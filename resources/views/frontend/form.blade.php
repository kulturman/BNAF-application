@extends('frontend.layout')

@section('content')
    <section class="wf100 subheader">
        <div class="container">
            <h2>Dénonciation</h2>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Accueil</a>
                </li>
                <li> Dénoncer un contrevenant </li>
            </ul>
        </div>
    </section>

    <div class="main-content p80">
        <div class="col-12">
            <div class="mb-4" style="padding: 50px">
                <div>
                    <div class="rounded-bottom">
                        {!! Form::open(['id' => 'reportsCreateForm', 'enctype' => "multipart/form-data", 'route' => 'reports.store', 'files' => true, 'class' => 'row g-3 main-form']) !!}

                        <!-- Canvas to display the captured photo -->
                        <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>

                        <!-- Localite Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('localite', __('models/reports.fields.localite').':') !!}
                            {!! Form::text('localite', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>


                        <!-- Structure Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('structure', __('models/reports.fields.structure').':') !!}
                            {!! Form::text('structure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <!-- Repere Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('repere', __('models/reports.fields.repere').':') !!}
                            {!! Form::text('repere', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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

                        <div class="form-group col-sm-6">
                            <button class="btn btn-primary" type="button" id="startButton">Utiliser votre appareil photo</button>
                            <video id="video" style="width: 100%;display:none;" autoplay></video>
                            <br>
                            <button class="btn-primary btn" type="button"  id="captureButton" style="display:none;">Capturer la photo</button>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Text Field -->
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::label('text', __('models/reports.fields.text').':') !!}
                            {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <!-- Longitude Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('longitude', __('models/reports.fields.longitude').':') !!}
                            {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
                            <strong class = "form-error-message"></strong>
                        </div>

                        <input name="photoInput" type="hidden" class="form-variable" id="photoInput"/>
                        <!-- Latitude Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('latitude', __('models/reports.fields.latitude').':') !!}
                            {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
                            <strong class = "form-error-message"></strong>
                        </div>


                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-success']) !!}
                            <a data-coreui-dismiss="modal" href="{{ route('reports.index') }}" class="btn btn-danger">
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
    {!! Html::script('js/sweetalert2.all.min.js') !!}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( 'textarea' ) )
            .then(() => {
                document.querySelector('.ck-editor__editable').style.height = '200px'
            })
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script>
        const startButton = document.getElementById('startButton');
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('captureButton');
        const photoInput = document.getElementById('photoInput');
        const photoForm = document.getElementById('photoForm');

        // Start the webcam when the "Start Webcam" button is clicked
        startButton.addEventListener('click', function () {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                    video.style.display = 'block'; // Show the video element
                    startButton.style.display = 'none'; // Hide the "Start Webcam" button
                    captureButton.style.display = 'block'; // Show the "Capture Photo" button
                })
                .catch(function (error) {
                    console.error('Error accessing the webcam:', error);
                });
        });

        // Capture the photo from the webcam
        captureButton.addEventListener('click', function () {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert the captured image to a data URL
            const imageDataURL = canvas.toDataURL('image/png');
            // Set the data URL as the value of the hidden input field
            photoInput.value = imageDataURL;
        });
    </script>
@endsection