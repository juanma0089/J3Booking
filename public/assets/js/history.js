$(function () {

    $('#lista_ac').ready(function () {
        ajaxQuery()
    });

    $('#search').on('click', function () {
        ajaxQuery()
    })

})
//TODO : HACER FUCION ↓
function ajaxQuery() {

    $('.history').remove()

    $.ajax({
        url: '/history',
        type: 'GET',
        data: {
            action: 'getbooks',
            date: $("input[name='datepicker']").val(),
            time: $("select[name='time']").val(),
            status: $("select[name='status']").val()
        },
        success: function (response) {
            var html = pintarTabla(response)
            $('#lista_ac').append(html)

            $('.delete-btn').on('click', function () {
                let bookname = $(this).attr('data-name')
                $("#btnCancelBook").attr('book-id', $(this).attr('data-id'));
                completeModal(bookname)
            })

        },
        error: function () {
            alert('Ha ocurrido un error al obtener las reservas.');
        }
    });
}


function pintarTabla(books) {
    let html = '';

    console.log(books)
    for (let i = 0; i < books.length; i++) {
        const book = books[i];

            html += '<div class="p-0 d-flex justify-content-around row text-white border-bottom history">' +

            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-4 p-lg-3 text-wrap">' +
            `<p class="mb-0 opacity-75">${book.name}</p>` +
            '</div>' +
            '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">' +
            `<p class="align-self-lg-center p-0 m-0">${book.diners}</p>` +
            '</div>' +
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center">' +
            `<p class="align-self-lg-center text-center  p-0 m-0">${book.rrpp}</p>` +
            '</div>' +
            '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">'+
            `<p class="align-self-lg-center p-0 m-0">pendiente</p>`+
            '</div>'+
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">' +
            ' <a class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">';
            if (book.status == 'accepted') {
                html += '<span class="text-success"><i class="bi bi-check-square fs-2"></i> Aceptada'
            }else if (book.status == 'waiting') {
                html += '<span class="text-warning"><i class="bi bi-hourglass-split fs-2"></i> En espera'
            } else {
                html += '<span class="text-danger"><i class="bi bi-x-square fs-2"></i> Cancelada'
            }
            html += '</span></a></div></div>';
    }

    return html;
}


function completeModal(bookname) {
    $('#messageModal').append(`¿Está seguro que desea cancelar la reserva de ${bookname}?`);
}
