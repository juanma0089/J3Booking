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
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // TODO Mostrar error si no se encuentran botellas en la base de datos.
            }
        });

    })

    $('#createbooking').submit(function (e) {
        e.preventDefault();

        // Obtener los valores de los campos de entrada
        var event_id = $('#event_id').val() ? $('#event_id').val() : '';
        var type = $('#type').val() ? $('#type').val() : '';
        var name = $('#name').val() ? $('#name').val() : '';
        var surname = $('#surname').val() ? $('#surname').val() : '';
        var diners = $('#diners').val() ? $('#diners').val() : '';
        var table_id = $('#table_id').val() ? $('#table_id').val() : '';
        // var bottles = $('#bottles').val() ? $('#bottles').val() : '';

        errors = validateFieldsBooking(event_id, type, name, surname, diners);

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

            var csrfToken = $('input[name="_token"]').val();
            var route = $('#createbooking').attr('action')

            $.ajax({
                url: route,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'event_id': event_id,
                    'type': type,
                    'name': name,
                    'surname': surname,
                    'diners': diners,
                    'table_id': table_id
                },
                success: function (data) {
                    // alert('Se ha creado el usuario con éxito.');
                    // $('#alertErrors').addClass('alert-success');
                    // $('#alertErrors').removeClass('alert-danger');
                    // $('#alertErrors').prepend('Reserva creada con éxito');
                    // $('#alertErrors').removeAttr('hidden');
                    // Redirigir a la vista de índice después de crear el evento exitosamente
                    window.location.href = "/";
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

    html += '<div id="divtypebottles_' + countbottle + '" class="form-outline text-white mb-4 col-3 col-md-4">' +
        '<select class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"' +
        'name="typebottle_' + countbottle + '" id="typebottles_' + countbottle + '" required>' +
        '<option value="00" selected>Seleccione un tipo</option>';

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
        '<option value="00" selected>Seleccione una botella</option>';

    $.each(arraybottles, function (id, bottle) {
        if (bottle.type == typebottle) {
            html += '<option value="' + bottle.id + '">' + bottle.name.charAt(0).toUpperCase() + bottle.name.slice(1) + ' - ' + bottle.price + '€' + '</option>';
        }
    });

    html += '</div>';

    return html;
}
