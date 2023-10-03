let idevent = $('#mainPanel').attr('idevent');
let minVipEsc = $('#minVipEsc').attr('minVipEsc');
let minVipMesa = $('#minVipMesa').attr('minVipMesa');
let minVipMesaAlta = $('#minVipMesaAlta').attr('minVipMesaAlta');

$(function () {
    getActualDate();


    $.ajax({
        url: '/oldindex/' + idevent,
        type: 'GET',
        data: {
            action: 'get_all_tables',
            idevent: idevent,
        },
        success: function (response) {
            let html = printTables(response)
            $('#mainPanel').append(html)
        },
        error: function () {
            alert('Ha ocurrido un error al obtener los usuarios.');
        }
    });
});

function printTables(tables) {

    let html = '';
    let firstTableRow = 0;

    console.log(tables)

    tables.forEach(table => {
        if (table.type == 'escenario') {
            if (firstTableRow < 1) {
                html +=
                    '<div class="row d-flex justify-content-center align-content-center mt-4">' +
                    '<h1 class="text-center">VIP Escenario</h1>'+
                    '<p class="text-center">Botellas min ('+ minVipEsc +')</p>';

                firstTableRow = 1;
            }

            html += htmlTypeTable(table.id, table.type, table.idbook, table.statusbook);
        }


        if (table.type == 'mesa') {
            if (firstTableRow < 2) {
                html += '</div><hr class="col-12 text-white">' +
                    '<div class="row d-flex justify-content-center align-content-center mt-4">' +
                    '<h1 class="text-center">Mesas VIP</h1>'+
                    '<p class="text-center">Botellas min ('+ minVipMesa +')</p>';

                firstTableRow = 2;
            }

            html += htmlTypeTable(table.id, table.type, table.idbook, table.statusbook);
        }

        if (table.type == 'mesaalta') {
            if (firstTableRow < 3) {
                html += '</div><hr class="col-12 text-white">' +
                    '<div class="row d-flex justify-content-center align-content-center mt-4">' +
                    '<h1 class="text-center">Mesas altas VIP</h1>'+
                    '<p class="text-center">Botellas min ('+ minVipMesaAlta +')</p>';

                firstTableRow = 3;
            }

            html += htmlTypeTable(table.id, table.type, table.idbook, table.statusbook);
        }

    });

    html += '</div>';
    return html;
}

function htmlTypeTable(id, type, has_booking = null, status) {

    switch (type) {

        case 'mesaalta':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<a ${(has_booking === null) ? "href=/booking/"+idevent+"/"+id : ''} table-id="${id}" class="bg-transparent border-0 ${(has_booking != null ? ((status == 'waiting') ? 'text-warning' : (status == 'accepted') ? 'text-danger' : 'text-success') : 'text-success')} m-0 p-0"><i class="bi bi-square-fill mesa-icon" onclick="animTable(this)"></i></a>` +
                '</div>'

        default:
            return '<div class="col d-flex justify-content-center p-0">' +
                `<a ${(has_booking === null) ? "href=/booking/"+idevent+"/"+id : ''} table-id="${id}" class="bg-transparent border-0 ${(has_booking != null ? ((status == 'waiting') ? 'text-warning' : (status == 'accepted') ? 'text-danger' : 'text-success') : 'text-success')} m-0 p-0"><i class="bi bi-displayport-fill mesa-icon" onclick="animTable(this)"></i></a>` +
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


