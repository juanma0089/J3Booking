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

    let html = '';
    let rowNumber = 1;
    let maxTables;
    let mesasPorFila = {
        in: [5, 7, 7, 7, 5, 5, 5],
        out: [6, 7, 6, 6, 4, 7],
        // optionals: []
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
                        // Si estamos en la zona exterior, actualizar el número de fila correspondiente
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


// function printTables(tables) {

//     let html = '<div class="row d-flex justify-content-center align-content-center">';
//     let rowNumber = 1;
//     let maxTables;
//     let newRow = false;
//     let lastMaxTables ;

//     let arrayMesasXFila = {
//         in: [5, 7, 7, 7, 5, 5, 5],
//         out: [6, 7, 6, 6, 4],
//         optionals: [7]
//     };

//     for (let i = 0; i < tables.length; i++) {
//         const table = tables[i];

//         switch (rowNumber) {
//             case 1:
//                 if (i == rowNumber - 1) {
//                     maxTables = 5;
//                     lastMaxTables = i + maxTables;
//                     newRow = true;
//                 }
//                 break;
//             case 2:
//                 if (i == lastMaxTables) {
//                     maxTables = lastMaxTables + 7;
//                     lastMaxTables = i + maxTables;
//                     newRow = true;
//                  }
//                  break;
//             case 3:
//                 if (i == lastMaxTables) {
//                     maxTables = lastMaxTables + 7;
//                     lastMaxTables = i + maxTables;
//                     newRow = true;
//                  }
//                  break;
//         }

//         // console.log('last' + lastMaxTables)

//         if (i < maxTables) {
//             if (newRow) {
//                 // Div de cada fila
//                 html += 
//                     `<div class="col-12 px-0 d-flex mb-sm-2 px-2"><h5>Fila ${rowNumber}</h5>` +
//                     '</div><div class="row row-cols-7">'

//                 newRow = false;
//             }

//             html += htmlTypeTable(table.type, table.id)

//             if (i == maxTables - 1)  {
//                 html += '</div>';
//                 rowNumber++;
//             }

//             // console.log('row ' + rowNumber)
//         } 

//     }

//     html += '</div>'

//     return html
// }

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