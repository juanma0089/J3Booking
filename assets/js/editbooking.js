let countbottle = 0;
let bottlesTypes = {};
let arraybottles = {};
$(function () {

    $('#addbottle').on('click', function () {
        $.ajax({
            url: '/getbottles',
            type: 'GET',
            success: function (response) {

                if (response.length > 0) {

                    arraybottles = response;

                    let html = generateHtmlTypeBottles(response)
                    $('#containerBottles').append(html);


                    $('[id^="typebottles_"]').on('change', function () {
                        identifier = this.id.split('_')
                        identifier = identifier[1]

                        $('#select_bottles_' + identifier).remove()

                        if (this.value != '00') {
                            let htmlbottles = generateHtmlBottles(identifier, this.value)
                            $('#divtypebottles_' + identifier).append(htmlbottles)
                        }
                    });

                    $('[id^="btndelete_"]').on('click', function () {
                        idbutton = this.id.split('_')
                        idbutton = idbutton[1]

                        $('#sectionbottle_'+idbutton).remove();
                    })
                }
                else{
                    toastr.error('No hay registro de botellas en la base de datos');
                }

            },
        });

    })
    $('#editbooking').submit(function (e) {
        e.preventDefault();

        // Crear un objeto FormData para recopilar todos los datos del formulario
        var formData = new FormData(this);

        errors = validateFieldsBooking(formData.get('event_id'), formData.get('type'), formData.get('name'), formData.get('surname'), formData.get('diners'));

        if (errors.length !== 0) {
            $('#alertErrors').empty();
            $('#alertErrors').removeAttr('hidden');

            $.each(errors, function (index, value) {
                $('#alertErrors').prepend(
                    `<li>${value}</li>`
                );
            });
        } else {
            $('#alertErrors').empty();
            $('#alertErrors').attr('hidden', 'true');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                processData: false, // No procesar los datos (FormData se encarga de eso)
                contentType: false, // No establecer el tipo de contenido (FormData se encarga de eso)
                data: formData, // Usar el objeto FormData que contiene todos los datos del formulario
                success: function (data) {
                    // Redirigir a la vista history del evento después de crear el evento exitosamente
                    window.location.href = "/history/" + formData.get('event_id');

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 422) {
                        var errors = jqXHR.responseJSON.errors;
                        $('#alertErrors').empty();
                        $('#alertErrors').removeAttr('hidden');
                        $.each(errors, function (index, value) {
                            $('#alertErrors').prepend(
                                `<li>${value}</li>`
                            );
                        });
                    } else {
                        window.location.reload();
                    }
                }
            });
        }
    });
});

function generateHtmlTypeBottles(bottles) {
    countbottle++;

    let html = '';

    html += '<section id="sectionbottle_' + countbottle + '" class="d-flex flex-column mb-2">' +
        '<i id="btndelete_' + countbottle + '" class="col-auto bi bi-x-circle p-0 align-self-start mb-1 bg-transparent border-0 text-danger text-start"> Eliminar</i>' +
        '<div id="divtypebottles_' + countbottle + '" class="form-outline text-white mb-4 col-3 col-md-4">' +
        '<select class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"' +
        'name="typebottle_' + countbottle + '" id="typebottles_' + countbottle + '" required>' +
        '<option value="" selected>Seleccione un tipo</option>';

    $.each(bottles, function (index, bottle) {
        bottlesTypes[bottle.type] = 1;
    });

    $.each(bottlesTypes, function (type) {
        html += '<option value="' + type + '">' + type.charAt(0).toUpperCase() + type.slice(1) + '</option>';
    });

    html += '</select></div>';

    return html;
}

function generateHtmlBottles(identifier, typebottle) {
    let html = '';

    html +=
        '<select class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"' +
        'name="bottles[]" id="select_bottles_' + identifier + '" required>' +
        '<option value="" selected>Seleccione una botella</option>';

    $.each(arraybottles, function (id, bottle) {
        if (bottle.type == typebottle) {
            html += '<option value="' + bottle.id + '">' + bottle.name.charAt(0).toUpperCase() + bottle.name.slice(1) + ' - ' + bottle.price + '€' + '</option>';
        }
    });

    html += '</div></section>';

    return html;
}

