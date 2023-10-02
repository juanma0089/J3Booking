
// Buttons map tables anim
function animTable(icon) {
    gsap.fromTo(icon, { opacity: 0, scale: 0 }, { opacity: 1, scale: 1, duration: 1 })
}


$('.fa-eye').on('click', function () {
    $('#password').attr('type') === 'password' ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
});

function validateFields(name = '', surname = '', email = '', phone = '', jobtitle = '', role = '') {
    let errors = [];
    let ok;

    if (!name) {
        errors.push('Por favor, introduzca un nombre.')
        ok = false;
    } else if (!name.match(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ]+)?$/)) {
        errors.push('El nombre introducido no es válido, contiene más de un espacio o carácteres especiales')
        ok = false;
    }

    if (!surname) {
        errors.push('Por favor, introduzca los apellidos.')
        ok = false;
    } else if (!surname.match(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ]+)?$/)) {
        errors.push('Los apellidos introducidos no son válidos, contiene más de un espacio o carácteres especiales')
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

function validateFieldsEvent(name = '', minvipesc = '', minvipmesa = '', minvipmesaalta = '', date = '', time = '') {
    let errors = [];
    let ok;

    if (!minvipesc) {
        errors.push('Por favor, introduzca el número mínimo de botellas para el escenario.')
        ok = false;
    } else if (isNaN(minvipesc) || minvipesc < 0) {
        errors.push('Por favor, introduzca un número válido para el min de botellas escenario')
        ok = false;
    }

    if (!minvipmesa) {
        errors.push('Por favor, introduzca el número mínimo de botellas para las mesas.')
        ok = false;
    } else if (isNaN(minvipmesa) || minvipmesa < 0) {
        errors.push('Por favor, introduzca un número válido para el min de botellas para las mesas')
        ok = false;
    }

    if (!minvipmesaalta) {
        errors.push('Por favor, introduzca el número mínimo de botellas para las mesas altas.')
        ok = false;
    } else if (isNaN(minvipmesaalta) || minvipmesaalta < 0) {
        errors.push('Por favor, introduzca un número válido para el min de botellas para las mesas altas')
        ok = false;
    }

    if (!date) {
        errors.push('Por favor, introduzca una fecha.');
        ok = false;
    } else {
        const inputDate = new Date(date);
        const currentDate = new Date();
        if (inputDate.getTime() < currentDate.getTime()) {
            errors.push('La fecha introducida es anterior al día de hoy.');
            ok = false;
        }
    }

    if (!time) {
        errors.push('Por favor, introduzca un turno.');
        ok = false;
    }

    return !ok ? errors : '';
}


function validateFieldsBooking(event_id = '',type='', name = '', surname = '',  diners = '') {
    let errors = [];
    let ok;

    if (!event_id) {
        errors.push('Se ha producido un error al asignar el evento.')
        ok = false;
    } else if (!event_id.match(/^[0-9]+?$/)) {
        errors.push('Se ha producido un error al asignar el evento.')
        ok = false;
    }
    if (!name) {
        errors.push('Por favor, introduzca un nombre.')
        ok = false;
    } else if (!name.match(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]+)?$/)) {
        errors.push('El nombre introducido no es válido')
        ok = false;
    }
    if (!surname) {
        errors.push('Por favor, introduzca apellidos.')
        ok = false;
    } else if (!surname.match(/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]+)?$/)) {
        errors.push('Los apellidos introducido no es válido')
        ok = false;
    }

    if (!diners) {
        errors.push('Por favor, introduzca el número de clientes.')
        ok = false;
    } else if (isNaN(diners) || diners < 1) {
        errors.push('Por favor, introduzca un número válido para el nº de clientes (mínimo 1).')
        ok = false;
    }
    if (!type) {
        errors.push('Ha ocurrido un error con el tipo de reserva.')
        ok = false;
    } else if (type != 'pista' && type != 'vip') {
        errors.push('Ha ocurrido un error con el tipo de reserva.')
        ok = false;
    }

    // if (!date) {
    //     errors.push('Por favor, introduzca una fecha.');
    //     ok = false;
    // } else {
    //     const inputDate = new Date(date);
    //     const currentDate = new Date();
    //     if (inputDate.getTime() < currentDate.getTime()) {
    //         errors.push('La fecha introducida es anterior al día de hoy.');
    //         ok = false;
    //     }
    // }

    // if (!time) {
    //     errors.push('Por favor, introduzca un turno.');
    //     ok = false;
    // }

    // if (!booking) {
    //     errors.push('Por favor, seleccione un tipo de reserva');
    //     ok = false;
    // }

    return !ok ? errors : '';
}

function getActualDate() {
    let fechaHoraActual = new Date();
    let hora = fechaHoraActual.getHours();
    let yesterday;
    let eventDate;

    if (hora >= 0 && hora < 8) {
        yesterday = new Date(fechaHoraActual.getTime());
        yesterday.setDate(fechaHoraActual.getDate() - 1);
        eventDate = yesterday.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
    } else {
        eventDate = fechaHoraActual.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
    }

    eventDate = convertDateFormat(eventDate);
    return eventDate;
}

function getTramo() {
    let fechaHoraActual = new Date();
    let hora = fechaHoraActual.getHours();
    let tramo;

    if (hora >= 22 && hora < 24 || hora >= 0 && hora < 8) {
        tramo = 'night';
    } else if (hora >= 15 && hora < 22) {
        tramo = 'afternoon'
    }

    return tramo;
}

function convertDateFormat(fecha) {
    // Separar el día, mes y año usando el método split()
    let parts = fecha.split('/');

    // Reconstruir la fecha en el formato "YYYY-mm-dd"
    let nuevaFecha = parts[2] + '-' + parts[1] + '-' + parts[0];

    return nuevaFecha;
}


