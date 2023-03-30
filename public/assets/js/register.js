$(function () {
    $('#register').submit(function (e) {
        e.preventDefault(); 

        // Obtener los valores de los campos de entrada
        var name = $('#name').val();
        var surname = $('#surname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var jobtitle = $('#jobtitle').val();

        var errors = array();
        var ok = true;

        // Validar los campos de entrada
        if (!name ) {
            errors.push('Por favor, introduzca su nombre.')
            ok = false;
        } else {
            
        }

        if (!email) {
            alert('Por favor, introduzca su correo electrónico.');
            return;
        }

        if (!jobtitle.length) {
            alert('Por favor, seleccione su puesto.');
            return;
        }

        $.ajax({
            url:' {{ route("register") }}', 
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}', 
                'name': name,
                'surname': surname,
                'email': email,
                'phone': phone,
                'jobtitle': jobtitle
            },
            success: function(data) {
                alert('Se ha creado el usuario con éxito.');
                window.location.href = '{{ route("index") }}';
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Hubo un error al crear el usuario: ' + textStatus);
            }
        });
    });
});
