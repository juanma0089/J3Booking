$(function () {

    $('#lista_ac').ready(function () {
        ajaxQuery()
    });

    $('#search').on('click', function () {
        ajaxQuery()
    })

    // $('.edit-btn').on('click', function () {
    //     let userId = $(this).attr('data-id');
    //     window.location.href = 'edituser/' + userId;
    // })

    $("#btnClose1, #btnClose2").on('click', function () {
        $('#messageModal').empty();
        $("#btnCancelBook").removeAttr('book-id');
    });

    $("#btnCancelBook").on('click', function () {
        let bookId = $(this).attr('book-id');

        $.ajax({
            url: '/books',
            type: 'GET',
            data: {
                action: 'cancelbook',
                id: bookId
            },
            success: function () {
                $("#btnClose1").click();
                ajaxQuery();

                // TODO ALERT DE QUE SE HA CANCELADO LA RESERVA
            },
            error: function () {
                alert('Ha ocurrido un error al eliminar el usuario.');
            }
        });
    });


})

function ajaxQuery() {
    $('.book').remove()
    $.ajax({
        url: '/books',
        type: 'GET',
        data: {
            action: 'getpendingbooks',
            date: $("input[name='datepicker']").val(),
            time: $("select[name='time']").val()
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


        html += '<div class="p-0 p-lg-3 d-flex justify-content-around row text-white border-bottom book">' +

            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-5 p-lg-3 text-wrap">' +
            `<p class="mb-0 opacity-75">${book.name}</p>` +
            '</div>' +
            '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">' +
            `<p class="align-self-lg-center p-0 m-0">${book.diners}</p>` +
            '</div>' +
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center">' +
            `<p class="align-self-lg-center text-center  p-0 m-0">${book.rrpp}</p>` +
            '</div>' +
            // '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">'+
            // `<p class="align-self-lg-center p-0 m-0">pendiente</p>`+
            // '</div>'+
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-2">' +
            '<div class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">' +
            `<button type="button" data-id="${book.id}" data-name="${book.name}" class=" fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button>` +
            `<button type="button" data-id="${book.id}" class="fs-2 bi bi-clipboard-check text-success bg-transparent border-0 edit-btn"></button>` +
            '</div></div></div>';
    }

    return html;
}


function completeModal(bookname) {
    $('#messageModal').append(`¿Está seguro que desea cancelar la reserva de ${bookname}?`);
}
