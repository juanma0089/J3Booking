$(function () {

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
                    'event_id' : event_id,
                    'type' : type,
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
