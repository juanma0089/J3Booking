$(function () {
    $('#createevent').submit(function (e) {
        e.preventDefault();

        // Obtener los valores de los campos de entrada
        var name = $('#name').val() ? $('#name').val() : '';
        var min_vip_esc = $('#min_vip_esc').val() ? $('#min_vip_esc').val() : '';
        var min_vip_mesa = $('#min_vip_mesa').val() ? $('#min_vip_mesa').val() : '';
        var min_vip_mesaalta = $('#min_vip_mesaalta').val() ? $('#min_vip_mesaalta').val() : '';
        var date = $('#date').val() ? $('#date').val() : '';
        var time = $('#time').val() ? $('#time').val() : '';

        // Obtener el campo de imagen
        var image = $('#image')[0].files[0]; // El primer archivo seleccionado

        errors = validateFieldsEvent(name, min_vip_esc, min_vip_mesa, min_vip_mesaalta, date, time);

        console.log(errors)
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
            var route = $('#createevent').attr('action');

            // Crear un objeto FormData para enviar el formulario con la imagen
            var formData = new FormData();
            formData.append('name', name);
            formData.append('min_vip_esc', min_vip_esc);
            formData.append('min_vip_mesa', min_vip_mesa);
            formData.append('min_vip_mesaalta', min_vip_mesaalta);
            formData.append('date', date);
            formData.append('time', time);
            formData.append('image', image); // Agregar la imagen al FormData

            $.ajax({
                url: route,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: formData, // Enviar el FormData en lugar de un objeto JSON
                processData: false, // Evitar que jQuery procese los datos
                contentType: false, // Evitar que jQuery configure el tipo de contenido
                success: function (data) {
                    // alert('Se ha creado el usuario con éxito.');
                    $('#alertErrors').addClass('alert-success');
                    $('#alertErrors').removeClass('alert-danger');
                    $('#alertErrors').prepend('Evento creado con éxito');
                    $('#alertErrors').removeAttr('hidden');
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
                        alert('Hubo un error al crear el evento: ' + textStatus);
                    }
                }
            });
        }
    });
});

