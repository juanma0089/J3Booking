$(function () {

    getActualDate();
    $.ajax({
        url: '/',
        type: 'GET',
        data: {
            action: 'get_all_tables'
        },
        success: function (response) {
            let html = printTables(response)
            $('#mainPanel').append(html)

        },
        error: function () {
            alert('Ha ocurrido un error al obtener los usuarios.');
        }
    });


    // ! CAMBIAR SELECTOR, DEBE LEER EL CLICK POR MESA, NO DIRECTAMENTE POR EL MODAL
    $('#selectAcceptedBooks').ready(function () {
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

                $('#selectAcceptedBooks').append(printAcceptedBooks(response));
            }
        });
    })


})

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

                html += htmlTypeTable(table.type, table.id);

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

function htmlTypeTable(table, id) {

    switch (table) {
        case 'normal':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-icon" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></i></button>` +
                '</div>'

        case 'cruzcampo':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-cruz" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></i></button>` +
                '</div>'

        case 'sofa':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-displayport-fill mesa-icon" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></i></button>` +
                '</div>'
    }

}

function printAcceptedBooks(books) {
    let html = '<option selected value="null" class="text-success">MESA LIBRE</option>';
    for (const index in books) {
        const book = books[index];
        console.log(book);
        html += `<option value="${book.id}">${book.name}</option>`;
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
