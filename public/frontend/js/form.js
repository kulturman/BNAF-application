/*let fieldWeights = {
    'region': 1,
    'province': 1,
    'commune': 1,
    'localite': 2,
    'structure': 1,
    'repere': 2,
    'nip': 1,
    'photo': 3,
    'message': 3,
    'recordingIndicator': 3,
    'espace': 3
};

let score = 0;*/

$(document).ready(function () {
    $(".select2").select2();

    const startButton = document.getElementById('startButton');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('captureButton');
    const photoInput = document.getElementById('photoInput');

// Start the webcam when the "Start Webcam" button is clicked
    startButton.addEventListener('click', function () {
        navigator.mediaDevices.getUserMedia({video: true})
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
        capturedImagePreview.src = photoInput.value;
        capturedImagePreview.style.display = 'block';
        video.style.display = 'none';
        console.log(canvas.toDataURL('image/png'));

    });

    function checkFormRelevance() {
        let fieldWeights = {
            'region': 1,
            'province': 1,
            'commune': 1,
            'localite': 2,
            'structure': 1,
            'repere': 2,
            'nip': 1,
            'photo': 3,
            'message': 3,
            'recordingIndicator': 3,
            'espace': 3
        };

        let filledFields = 0;

        $('.form-control').each(function (index, element) {
            if (element.value && fieldWeights.hasOwnProperty(this.id)) {
                filledFields += fieldWeights[this.id];
            }
        });

        if (filledFields > 12) {
            $('.form-irrelevant, .form-irrelevant_orange').hide();
            $('.form-relevant').show();
        } else if (filledFields >= 5 && filledFields <= 12) {
            $('.form-irrelevant').hide();
            $('.form-irrelevant_orange').show();
            $('.form-relevant').hide();
        } else {
            $('.form-irrelevant').show();
            $('.form-irrelevant_orange, .form-relevant').hide();
        }

        $('#score').val(filledFields);
    }


    $('input,textarea').on('keyup', checkFormRelevance)
    $('select').on('change', checkFormRelevance)

    let regions = {
        "BOUCLE DU MOUHOUN": [
            "BALE",
            "BANWA",
            "KOSSI",
            "MOUHOUN",
            "NAYALA",
            "SOUROU"
        ],
        "CASCADES": [
            "COMOE",
            "LERABA"
        ],
        "CENTRE": [
            "KADIOGO"
        ],
        "CENTRE-EST": [
            "BOULGOU",
            "KOULPELOGO",
            "KOURITENGA"
        ],
        "CENTRE-NORD": [
            "BAM",
            "NAMENTENGA",
            "SANMATENGA"
        ],
        "CENTRE-OUEST": [
            "BOULKIEMDE",
            "SANGUIE",
            "SISSILI",
            "ZIRO"
        ],
        "CENTRE-SUD": [
            "BAZEGA",
            "NAHOURI",
            "ZOUNDWEOGO"
        ],
        "EST": [
            "GNAGNA",
            "GOURMA",
            "KOMANDJARI",
            "KOMPIENGA",
            "TAPOA"
        ],
        "HAUTS-BASSINS": [
            "HOUET",
            "KENEDOUGOU",
            "TUY"
        ],
        "NORD": [
            "LOROUM",
            "PASSORE",
            "YATENGA",
            "ZONDOMA"
        ],
        "PLATEAU CENTRAL": [
            "GANZOURGOU",
            "KOURWEOGO",
            "OUBRITENGA"
        ],
        "SAHEL": [
            "OUDALAN",
            "SENO",
            "SOUM",
            "YAGHA"
        ],
        "SUD-OUEST": [
            "BOUGOURIBA",
            "IOBA",
            "NOUMBIEL",
            "PONI"
        ]
    };

    let provinces = {
        "BALE": "0101",
        "BANWA": "0102",
        "KOSSI": "0103",
        "MOUHOUN": "0104",
        "NAYALA": "0105",
        "SOUROU": "0106",
        "COMOE": "0201",
        "LERABA": "0202",
        "KADIOGO": "0301",
        "BOULGOU": "0401",
        "KOULPELOGO": "0402",
        "KOURITENGA": "0403",
        "BAM": "0501",
        "NAMENTENGA": "0502",
        "SANMATENGA": "0503",
        "BOULKIEMDE": "0601",
        "SANGUIE": "0602",
        "SISSILI": "0603",
        "ZIRO": "0604",
        "BAZEGA": "0701",
        "NAHOURI": "0702",
        "ZOUNDWEOGO": "0703",
        "GNAGNA": "0801",
        "GOURMA": "0802",
        "KOMANDJARI": "0803",
        "KOMPIENGA": "0804",
        "TAPOA": "0805",
        "HOUET": "0901",
        "KENEDOUGOU": "0902",
        "TUY": "0903",
        "LOROUM": "1001",
        "PASSORE": "1002",
        "YATENGA": "1003",
        "ZONDOMA": "1004",
        "GANZOURGOU": "1101",
        "KOURWEOGO": "1102",
        "OUBRITENGA": "1103",
        "OUDALAN": "1201",
        "SENO": "1202",
        "SOUM": "1203",
        "YAGHA": "1204",
        "BOUGOURIBA": "1301",
        "IOBA": "1302",
        "NOUMBIEL": "1303",
        "PONI": "1304"
    }


    let communes = {
        "0101": ["BAGASSI", "BANA", "BOROMO", "FARA", "OURY", "PA", "POMPOI", "POURA", "SIBY", "YAHO"],
        "0102": ["BALAVE", "KOUKA", "SAMI", "SANABA", "SOLENZO", "TANSILA"],
        "0103": ["BARANI", "BOMBOROKUY", "BOURASSO", "DJIBASSO", "DOKUY", "DOUMBALA", "KOMBORI", "MADOUBA", "NOUNA", "SONO"],
        "0104": ["BONDOKUY", "DEDOUGOU", "DOUROULA", "KONA", "OUARKOYE", "SAFANE", "TCHERIBA"],
        "0105": ["GASSAN", "GOSSINA", "KOUGNY", "TOMA", "YABA", "YE"],
        "0106": ["DI", "GOMBORO", "KASSOUM", "KIEMBARA", "LANFIERA", "LANKOUE", "TOENI", "TOUGAN"],
        "0201": ["BANFORA", "BEREGADOUGOU", "MANGODARA", "MOUSSODOUGOU", "NIANGOLOKO", "OUO", "SIDERADOUGOU", "SOUBAKANIEDOUGOU", "TIEFORA"],
        "0202": ["DAKORO", "DOUNA", "KANKALABA", "LOUMANA", "NIANKORODOUGOU", "OUELENI", "SINDOU", "WOLONKOTO"],
        //"0601": ["SIGLE", "SOAW", "SOURGOU", "THYOU"],
        "0602": ["DASSA", "DIDYR", "GODYR", "KORDIE", "KYON", "POUNI", "REO", "TENADO", "ZAMO", "ZAWARA"],
        "0603": ["BIEHA", "BOURA", "LEO", "NEBIELIANAYOU", "NIABOURI", "SILLY"],
        "0301": ["KOMKI-IPALA", "KOMSILGA", "KOUBRI", "OUAGADOUGOU"],
        "0604": ["BAKATA", "BOUGNOUNOU", "DALO", "GAO", "CASSOU", "SAPOUY"],
        "0701": ["DOULOUGOU", "GAONGO", "IPELCE", "OUAGADOUGOU", "KAYAO", "PABRE", "SAABA", "TANGHIN-DASSOURI"],
        "0401": ["BAGRE", "BANE", "KOMBISSIRI", "SAPONE", "TOECE"],
        "0702": ["GUIARO", "PO", "TIEBELE"],
        "0803": ["BARTIEBOUGOU", "FOUTOURI", "GAYERI", "KOMPIENGA", "MADJOARI", "PAMA"],
        "0804": ["BOTOU", "DIAPAGA", "KANTCHARI", "LOGOBOU", "NAMOUNOU", "PARTIAGA", "TAMBAGA", "TANSARGA"],
        "0901": ["BAMA", "BOBO-DIOULASSO", "DANDE", "BEGUEDO", "BISSIGA", "BITTOU", "FARAMANA", "FO", "BOUSSOUMA", "GARANGO", "KOMTOEGA", "NIAOGO", "TENKODOGO", "ZABRE", "ZOAGA", "KARANGASSO-SAMBLA", "KARANGASSO-VIGUE", "KOUNDOUGOU", "LENA", "PADEMA", "PENI", "ZONSE", "SATIRI", "TOUSSIANA"],
        "0902": ["BANZON", "DJIGOUERA", "KANGALA", "DOURTENGA", "COMIN-YANGA", "LALGAYE", "OUARGAYE", "SANGA", "SOUDOUGUI", "YARGATENGA", "YONDE"],
        //"0903": ["ANDEMTENGA", "KAYAN", "KOLOKO", "KOURINION", "KOUROUMA", "MOROLABA", "N'DOROLA", "ORODARA", "SAMOROGOUAN", "SAMOGOHIRI", "SINDO"],
        "0903": ["BEKUY", "BEREBA", "BONI", "FOUNZAN", "HOUNDE", "KOTI", "KOUMBIA"],
        "1001": ["BANH", "OUINDIGUI", "SOLLE", "TITAO"],
        "1002": ["ARBOLE", "BAGARE", "BOKIN", "GOMPONSOM", "KIRSI", "LA-TODIN", "PILIMPIKOU", "SAMBA", "YAKO"],
        "0403": ["BASKOURE", "DIALGAYE", "GOUNGHIN", "KANDO", "KOUPELA", "POUYTENGA", "TENSOBENTENGA", "YARGO"],
        "0501": ["BOURZANGA", "GUIBARE", "KONGOUSSI"],
        "1003": ["BARGA", "KAIN", "NASSERE", "KALSAKA", "KOSSOUKA", "KOUMBRI", "NAMISSIGUIMA", "OUAHIGOUYA", "OULA", "RAMBO", "SEGUENEGA", "TANGAYE", "THIOU", "ZOGORE"],
        "1004": ["BASSI", "BOUSSOU", "GOURCY", "LEBA", "TOUGO"],
        "1101": ["BOUDRY", "KOGHO", "MEGUET", "MOGTEDO", "SALOGO", "ZAM", "ZORGHO", "ZOUNGOU"],
        "1102": ["BOUSSE", "LAYE", "NIOU", "SOURGOUBILA", "ROLLO", "ROUKO", "SABCE", "TIKARE", "ZIMTENGA"],
        //"1102": ["BOALA", "BOULSA", "BOUROUM", "DARGO", "DORI", "FALAGOUNTOU", "GORGADJI", "SAMPELGA", "SEYTENGA"],
        "1203": ["ARBINDA", "BARABOULE", "NAGBINGOU", "TOUGOURI", "YALGO", "ZEGUEDEGUIN", "DJIBO", "KELBO", "KOUTOUGOU", "NASSOUMBOU", "POBE-MENGAO", "TONGOMAYEL"],
        //"1103": ["BERE", "BINDE", "GOGO", "GOMBOUSSOUGOU", "GUIBA", "MANGA", "NOBERE"],
        "0801": ["BILANGA", "BOGANDE", "COALLA", "LIPTOUGOU", "MANI", "PIELA", "NAMISSIGUIMA", "PENSA", "PIBAORE", "PISSILA", "ZIGA"],
        "0601": ["BINGO", "IMASGO", "KINDI", "KOKOLOGHO", "KOUDOUGOU", "NANDIALA", "NANORO", "PELLA", "POA", "RAMONGO", "SABOU", "THION"],
        "0802": ["DIABO", "DIAPANGOU", "FADA N'GOURMA", "MATIACOALI", "TIBGA", "YAMBA", "TOEGHIN"],
        "1103": ["ABSOUYA", "DAPELOGO", "LOUMBILA", "NAGREONGO", "OURGOU-MANEGA", "ZINIARE", "ZITENGA"],
        "1201": ["DEOU", "GOROM-GOROM", "MARKOYE", "OURSI", "TIN-AKOFF"],
        "1202": ["BANI", "DIGUEL"],
        "1204": ["BOUNDORE", "MANSILA", "SEBBA", "SOLHAN", "TANKOUGOUNADIE", "TITABE"],
        "1301": ["DIEBOUGOU", "DOLO", "BONDIGUI", "IOLONIORO", "TIANKOURA"],
        "1302": ["DANO", "DISSIN", "GUEGUERE", "KOPER", "NIEGO", "ORONKUA", "OUESSA", "ZAMBO"],
        "1303": ["BATIE", "BOUSSOUKOULA", "KPUERE", "LEGMOIN", "MIDEBDO"],
        "1304": ["BOUROUM-BOUROUM", "BOUSSERA", "DJIGOUE", "GAOUA"]
    }


    for (let currentRegion in regions) {
        region.insertAdjacentHTML('beforeend', `<option value="${currentRegion}">${currentRegion}</option>`)
    }

    region.addEventListener('change', e => {
        let provinces = regions[e.target.value];
        province.innerHTML = '<option></option>';

        provinces.forEach(currentProvince => {
            province.insertAdjacentHTML('beforeend', `<option>${currentProvince}</option>`)
        });

        province.dispatchEvent(new Event('change'));
    });

    province.addEventListener('change', e => {
        //let commun = regions[e.target.value];
        commune.innerHTML = '<option></option>';

        let key = provinces[e.target.value];
        let communesToDisplay = communes[key];

        if (communesToDisplay) {
            communesToDisplay.forEach(currentCommune => {
                commune.insertAdjacentHTML('beforeend', `<option>${currentCommune}</option>`)
            })
        }
    });

    $(document).on('submit', '#reportsCreateForm', function (e) {
        e.preventDefault();

        if ($('#score').val() == 0) {
            alert('Veuillez remplir au moins un champ');
            return;
        }
        var id = "#" + $(this).attr('id');
        var form = $(id);
        showLoader();

        let formData = new FormData($(id)[0]);

        $('.form-variable').each(function (index, el) {
            formData.append($(el).attr('name'), $(el).val());
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
                    if (data.dialog)
                        success(data.message);
                    else {
                        var message = '<div id="message-block" class="alert alert-block alert-success">' +
                            data.message + '</div>';
                        $('.card')
                            .before(message);
                    }
                    if (data.reset)
                        $(form).trigger('reset');

                    if (data.url) {
                        setTimeout(() => {
                            document.location.href = data.url
                        }, 2000)
                    }

                    if (ajaxFormHandlerSuccessCallback) {
                        ajaxFormHandlerSuccessCallback(data);
                    }
                } else {
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
});