$(function () {
    getActualDate();
    $.ajax({
        url: '/',
        type: 'GET',
        data: {
            action: 'get_all_tables',
            date: getActualDate(),
            tramo: getTramo()
        },
        success: function (response) {
            let html = printTables(response)
            $('#mainPanel').append(html)

            $('.mesa-icon, .mesa-cruz').on('click', function () {
                let bookid = '';
                let tableid = $(this).parent().attr('table-id');
                let iconmesa = $(this);
                console.log(tableid)

                $('#modal-table').attr('tableid', tableid)

                $('#btn-modal').trigger('click');

                $.ajax({
                    url: "/books",
                    type: "GET",
                    data: {
                        action: 'getAcceptedBooks',
                        date: getActualDate(),
                        tramo: getTramo()
                    },
                    success: function (response) {
                        console.log(response)

                        $('#selectAcceptedBooks').append(printAcceptedBooks(response, tableid));

                        $('#assignTable').on('click', function () {
                            // Desactivar el botón de asignar mesa
                            $('#assignTable').prop('disabled', true);

                            bookid = $('#selectAcceptedBooks').val()

                            $.ajax({
                                url: "/books",
                                type: "GET",
                                data: {
                                    action: 'assignTable',
                                    bookid: bookid,
                                    tableid: tableid,
                                    date: getActualDate(),
                                    tramo: getTramo()
                                },
                                success: function (response) {
                                    console.log(response)
                                    response = response['success'];

                                    if (response == 'deleted') {
                                        $(iconmesa).removeClass('text-danger');
                                        $(iconmesa).addClass('text-success');
                                        toastr.info('Mesa liberada','¡Libre!');
                                    } else if(response == 'assigned'){
                                        $(iconmesa).removeClass('text-success');
                                        $(iconmesa).addClass('text-danger');
                                        toastr.success('Mesa asignada','¡Asignada!');
                                    }else if(response == 'failed'){
                                        toastr.warning('Antes debes vaciar la mesa','¡Vacía la mesa!');
                                    }
                                },
                                complete: function () {
                                    // Activar el botón de asignar mesa después de que se haya completado la solicitud
                                    $('#assignTable').prop('disabled', false);
                                }
                            });
                            // Eliminar el manejador de eventos 'click' después de hacer clic en el botón para no ejecutar varias veces la función
                            $('#assignTable').off('click');
                        })
                    }
                });
            })
        },
        error: function () {
            alert('Ha ocurrido un error al obtener los usuarios.');
        }
    });
});

function printTables(tables) {

    let html = '';
    let rowNumber = 1;
    let maxTables;
    let mesasPorFila = {
        in: [5, 7, 7, 7, 5, 5, 5],
        out: [6, 7, 6, 6, 4, 7],
        // optionals: [7] El 7 lo he añadido como las mesas de fuera, ya que en la bd solo hay in y out
    };
    let outRowNumber = 1; // Número de fila para la zona exterior
    let firstout = true;

    for (let posicion in mesasPorFila) {

        let mesas = mesasPorFila[posicion];
        let mesasIndex = 0;

        for (let i = 0; i < tables.length; i++) {
            const table = tables[i];

            if (table.position == posicion) {
                if (posicion === 'out') {
                    // Si estamos en la zona exterior, usar el número de fila correspondiente

                    if (firstout) {
                        html += '<hr class="col-12 text-white">' +
                            '<div class="row d-flex justify-content-center align-content-center mt-4">' +
                            '<h1 class="text-center">Exterior</h1>';

                        firstout = false;
                    }

                    rowNumber = outRowNumber;

                }
                if (mesasIndex == 0) {
                    // Se necesita una nueva fila
                    html += `<div class="row d-flex justify-content-center align-content-center"><h5>Fila ${rowNumber}</h5><div class="row row-cols-${mesas[rowNumber - 1] || 1}">`;
                }

                html += htmlTypeTable(table.type, table.id, table.has_booking);

                mesasIndex++;

                if (mesasIndex == mesas[rowNumber - 1]) {
                    // Se completó la fila actual
                    html += '</div></div>';
                    if (posicion === 'out') {
                        outRowNumber++;
                    } else {
                        rowNumber++;
                    }
                    mesasIndex = 0;
                }
            }
        }
    }

    return html;
}

function htmlTypeTable(table, id, has_booking = 0) {

    switch (table) {
        case 'normal':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 ${(has_booking == 1 ? 'text-danger' : 'text-success')} m-0 p-0"><i class="bi bi-square-fill mesa-icon" onclick="animTable(this)"></i></button>` +
                '</div>'

        case 'cruzcampo':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 ${(has_booking == 1 ? 'text-danger' : 'text-success')} m-0 p-0"><i class="bi bi-square-fill mesa-cruz" onclick="animTable(this)"></i></button>` +
                '</div>'

        case 'sofa':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 ${(has_booking == 1 ? 'text-danger' : 'text-success')} m-0 p-0"><i class="bi bi-displayport-fill mesa-icon" onclick="animTable(this)"></i></button>` +
                '</div>'
    }

}


function printAcceptedBooks(books, tableid) {

    $('option').remove();

    let html = '<option value="" class="text-success">MESA LIBRE</option>';
    for (const index in books) {
        const book = books[index];
        console.log(book.table_id);
        if (!book.table_id || book.table_id == tableid) {

            html += `<option value="${book.id}" ${book.table_id == tableid ? 'selected' : ''}>${book.name} - ${book.diners} personas</option>`;
        }
    }
    return html;
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
        console.log('La fecha de ayer sin hora es: ' + eventDate);
    } else {
        eventDate = fechaHoraActual.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
        console.log('La fecha sin hora es: ' + eventDate);
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
