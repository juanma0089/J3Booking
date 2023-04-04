$('.fa-eye').on('click', function () {
    $('#password').attr('type') === 'password' ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
});

function validateFields(name = '', surname = '', email = '', phone = '', jobtitle = '', role = '') {
    let errors = [];
    let ok;

    if (!name) {
        errors.push('Por favor, introduzca un nombre.')
        ok = false;
    } else if (!name.match(/^[a-zA-Z ]{2,}$/)) {
        errors.push('El nombre introducido no es válido')
        ok = false;
    }
    
    if (!surname) {
        errors.push('Por favor, introduzca los apellidos.')
        ok = false;
    } else if (!surname.match(/^[a-zA-Z ]{2,}$/)) {
        errors.push('Los apellidos introducidos no son válidos')
        ok = false;
    }

    if (!email) {
        errors.push('Por favor, introduzca un correo electrónico.');
        ok = false;
    } else if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        errors.push('El email introducido no es válido')
        ok = false;
    }

    if (!phone) {
        errors.push('Por favor, introduzca un teléfono.');
        ok = false;
    } else if (!phone.match(/^[0-9]{9}$/ || phone.length != 9)) {
        errors.push('El teléfono introducido no es válido')
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

    return !ok ? errors : '';
}


