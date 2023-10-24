
function showLoader() {
    HoldOn.open({
        theme: "sk-circle",
        message: "<h4>Veuillez patienter</h4>"
    });
}

function closeLoader() {
    HoldOn.close();
}

function success(message) {
    swal(
            'L\'opération est un succès!',
            message,
            'success'
            );
}

function error(message) {
    swal(
            'Echec!',
            message,
            'error'
            );
}

function question(message, yesCallback, noCallback) {

    swal({
        title: 'Etes vous sûr?',
        text: message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            yesCallback();

        } else if (result.dismiss === swal.DismissReason.cancel) {
            if (noCallback)
                noCallback();
        }
    })
}

function yesOrNoQuestion(title, message, yesCallback, noCallback) {

    swal({
        title: title,
        text: message,
        type: 'info',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non'
    }).then((result) => {
        if (result.value) {
            yesCallback();

        } else if (result.dismiss === swal.DismissReason.cancel) {
            if (noCallback)
                noCallback();
        }
    })
}
$.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        }
);

$(document).on('submit', '.main-form,.ajaxForm', function (e) {
    e.preventDefault();
    var id = "#" + $(this).attr('id');
    var form = $(id);
    showLoader();

    let formData = new FormData($(id)[0]);

    $('.form-variable').each(function(index , el) {
        formData.append($(el).attr('name') ,$(el).val());
    });

    if (typeof formVariables !== 'undefined') {
        formVariables.forEach(variable => formData.append(variable.name, variable.data));
    }

    $('input+strong,select+strong,textarea+strong').text('');
    $('#message-block').remove();
    $.ajax({
        url: $(form).attr('action'),
        //method: $('input[name="_method"]').val() || $(form).attr('method') || 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST'
    })
        .done(function (data) {
            closeLoader();
            if (data.success) {
                if(data.dialog)
                    success(data.message);
                else {
                    var message = '<div id="message-block" class="alert alert-block alert-success">' +
                        data.message + '</div>';
                    $('.card')
                        .before(message);
                }
                if(data.reset)
                    $(form).trigger('reset');

                if (data.url) {
                    setTimeout(() => {
                        document.location.href = data.url
                    }, 2000)
                }

                LaravelDataTables["dataTableBuilder"].draw()
                if (ajaxFormHandlerSuccessCallback){
                    ajaxFormHandlerSuccessCallback(data);
                }
            }
            else {
                error(data.message);
            }
            if (data.url) {
                window.location.href = data.url;
            }
        })
        .fail(function (data) {
            closeLoader();
            $.each(data.responseJSON.errors, function (key, value) {
                var input = id + ' [name=' + key + ']';
                var arrayInput = id + ' [name="' + key + '[]"]';
                $(input + '+strong').text(value);
                $(arrayInput + '+strong').text(value);
            });
        });

});

$(document).on('click' , '.ajax-confirmation-button' , function (e) {
    e.preventDefault();
    var that = $(this);
    var url = that.attr('href');
    var text = that.attr('data-confimation-message') || `Voulez vous vraiment ${that.attr('title')}?`;
    question(text, function () {
        showLoader();
        $.ajax({
            method: 'POST',
            url: url
        }).done(function (data) {
            closeLoader();
            if (data.success) {
                success(data.message);
            }

            if (that.attr('data-update-dt')) {
                LaravelDataTables["dataTableBuilder"].draw()
            }
        }).fail(function () {
            closeLoader();
        })
    })
})

$(document).on('click' , '.dt-actions-btn' , function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    let that = $(this);

    showLoader()
    $.get(url)
        .done(function (data) {
            closeLoader()
            $('#crudModal .modal-content').html(data)
            $('#crudModal').modal('show')
            if (typeof onDtActionsButtonSuccess != 'undefined') {
                onDtActionsButtonSuccess(that.attr('data-button-type'))
            }
        })
        .fail(function (data) {
            closeLoader()
        })
})

function makeClientSideDateTable (selector) {
    $(selector).DataTable({
        language:
            {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                    "rows": {
                        _: "%d lignes séléctionnées",
                        0: "Aucune ligne séléctionnée",
                        1: "1 ligne séléctionnée"
                    }
                }
            }
    });
}
