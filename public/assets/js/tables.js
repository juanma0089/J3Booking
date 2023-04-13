$(function () {

    $('#mainPanel').ready(function () {
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
    });

})

function printTables(tables) {

    let html = '<div class="row d-flex justify-content-center align-content-center">';
    let rowNumber = 1;
    let maxTables;
    let newRow = false;
    let lastMaxTables ;

    for (let i = 0; i < tables.length; i++) {
        const table = tables[i];

        switch (rowNumber) {
            case 1:
                if (i == rowNumber - 1) {
                    maxTables = 5;
                    lastMaxTables = i + maxTables;
                    newRow = true;
                }
                break;
            case 2:
                if (i == lastMaxTables) {
                    maxTables = lastMaxTables + 7;
                    lastMaxTables = i + maxTables;
                    newRow = true;
                 }
                 break;
            case 3:
                if (i == lastMaxTables) {
                    maxTables = lastMaxTables + 7;
                    lastMaxTables = i + maxTables;
                    newRow = true;
                 }
                 break;
        }

        // console.log('last' + lastMaxTables)

        if (i < maxTables) {
            if (newRow) {
                // Div de cada fila
                html += 
                    `<div class="col-12 px-0 d-flex mb-sm-2 px-2"><h5>Fila ${rowNumber}</h5>` +
                    '</div><div class="row row-cols-7">'

                newRow = false;
            }

            html += htmlTypeTable(table.type, table.id)

            if (i == maxTables - 1)  {
                html += '</div>';
                rowNumber++;
            }

            // console.log('row ' + rowNumber)
        } 

    }

    html += '</div>'

    return html
}

function htmlTypeTable(table, id) {

    switch (table) {
        case 'normal':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-icon"></i></button>` +
                '</div>'

        case 'cruzcampo':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-cruz"></i></button>` +
                '</div>'

        case 'sofa':
            return '<div class="col d-flex justify-content-center p-0">' +
                `<button table-id="${id}" class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-displayport-fill mesa-icon"></i></button>` +
                '</div>'
    }

}