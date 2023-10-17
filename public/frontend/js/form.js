$(".select2").select2();

ClassicEditor
    .create( document.querySelector( 'textarea' ) )
    .then(() => {
        document.querySelector('.ck-editor__editable').style.height = '200px'
        document.querySelector('.ck-editor__editable').addEventListener('focus', e => {
            document.querySelector('.ck-editor__editable').style.height = '200px'
        })
    })
    .catch( error => {
        console.error( error );
    } );

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
            video.style.display = 'block';
            startButton.style.display = 'none';
            captureButton.style.display = 'block';
        })
        .catch(function (error) {
            console.error('Error accessing the webcam:', error);
        });
});

captureButton.addEventListener('click', function () {
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the captured image to a data URL
    photoInput.value = canvas.toDataURL('image/png');
});

let filledFields = 0;

function checkFormRelevance () {
    filledFields = 0;

    $('.form-control').each(function (index, element) {
        if (element.value) {
            filledFields++;
        }
    })

    if (filledFields >= 4) {
        $('.form-irrelevant').hide();
        $('.form-relevant').show();
    }
    else {
        $('.form-irrelevant').show();
        $('.form-relevant').hide();
    }
}

$('input').on('keyup', checkFormRelevance)

$('select').on('change', checkFormRelevance)