$(function () {
    $('#register').submit(function (e) {
        e.preventDefault();

        // Obtener los valores de los campos de entrada
        var name = $('#name').val() ? $('#name').val() : '';
        var surname = $('#surname').val() ? $('#surname').val() : '';
        var email = $('#email').val() ? $('#email').val() : '';
        var phone = $('#phone').val() ? $('#phone').val() : '';
        var jobtitle = $('#jobtitle').val() ? $('#jobtitle').val() : '';
        var role = $('#role').val() ? $('#role').val() : '';

        var errors = [];
        var ok = true;

        // Validar los campos de entrada
        if (!name) {
            errors.push('Por favor, introduzca su nombre.')
            ok = false;
        } else if (!name.match(/^[a-zA-Z]{2,}$/)) {
            errors.push('El nombre introducido no es válido')
            ok = false;
        }

        if (!email) {
            errors.push('Por favor, introduzca su correo electrónico.');
            ok = false;
        } else if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
            errors.push('El email introducido no es válido')
            ok = false;
        }

        if (!jobtitle) {
            errors.push('Por favor, seleccione un puesto de trabajo.');
            ok = false;
        } else if (jobtitle != 'rrpp') {
            errors.push('El usuario debe tener un puesto de Relaciones públicas')
            ok = false;
        }

        if (!role) {
            errors.push('Por favor, seleccione un rol de permisos.');
            ok = false;
        } else if (role != 'normal' && role != 'moderator' && role != 'admin') {
            errors.push('El usuario debe tener un rol válido')
            ok = false;
        }

        if (!ok) {
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
            var route = $('#register').attr('action')

            $.ajax({
                url: route,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'name': name,
                    'surname': surname,
                    'email': email,
                    'phone': phone,
                    'jobtitle': jobtitle,
                    'role' : role
                },
                success: function (data) {
                    // alert('Se ha creado el usuario con éxito.');
                    $('#alertErrors').addClass('alert-success');
                    $('#alertErrors').removeClass('alert-danger');
                    $('#alertErrors').prepend('Usuario creado con éxito');
                    $('#alertErrors').removeAttr('hidden');

                    console.log(email);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Hubo un error al crear el usuario: ' + textStatus);
                }
            });
        }
    });
});
