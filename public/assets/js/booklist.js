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
        $("#btnConfirmModal").removeAttr('book-id');
    });

    $("#btnConfirmModal").on('click', function () {


        let action = $(this).attr('action')
        let bookId = $(this).attr('book-id');

        $.ajax({
            url: '/books',
            type: 'GET',
            data: {
                action: action,
                id: bookId
            },
            success: function () {
                $("#btnClose1").click();

                ajaxQuery();

                // TODO ALERT DE QUE SE HA CANCELADO O CONFIRMADO LA RESERVA
                createAlert(action)
            },
            error: function () {
                alert('Ha ocurrido un error.');
            }
        });
    });


})

function ajaxQuery(action) {

    $('.book').remove()

    var eventinput = $("select[name='event']").val() ?? 'none';
    var rrppinput = $("select[name='rrpp']").val() ?? 'all';


    $.ajax({
        url: '/books',
        type: 'GET',
        data: {
            action: 'getbooks',
            event: eventinput ??  $("select[name='event']").val(),
            rrpp: rrppinput ?? $("select[name='rrpp']").val()
        },
        success: function (response) {
            var html = pintarTabla(response)
            $('#lista_ac').append(html)

            $('.delete-btn').on('click', function () {
                let bookname = $(this).attr('data-name')
                $("#btnConfirmModal").attr('book-id', $(this).attr('data-id'));
                $("#btnConfirmModal").attr('action', 'cancelbook');
                $('#btnConfirmModal').removeClass('btn-outline-success').addClass('btn-outline-danger');
                completeModal(bookname, 'delete')
            })

            $('.confirm-btn').on('click', function () {
                let bookname = $(this).attr('data-name')
                $("#btnConfirmModal").attr('book-id', $(this).attr('data-id'));
                $("#btnConfirmModal").attr('action', 'acceptbook');
                $('#btnConfirmModal').removeClass('btn-outline-danger').addClass('btn-outline-success');
                completeModal(bookname, 'accept')
            })

        },
        error: function () {
            alert('Ha ocurrido un error al obtener las reservas.');
        }
    });
}


function pintarTabla(books) {
    let html = '';
    let role = $('#roleuser').attr('role');

        for (let i = 0; i < books.length; i++) {
            const book = books[i];


            html += '<div class="p-0 p-lg-3 d-flex justify-content-around row text-white border-bottom book">' +

                '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-5 p-lg-3 text-wrap">' +
                `<p class="mb-0 opacity-75">${book.name}` + ` ` + `${book.surname} </p>` +
                '</div>' +
                '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-1 col-lg-2 d-flex justify-content-center">' +
                `<p class="align-self-lg-center p-0 m-0">${book.diners}</p>` +
                '</div>' +
                '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-3 d-flex justify-content-center">' +
                `<p class="align-self-lg-center text-center  p-0 m-0">${book.rrpp}</p>` +
                '</div>' +

                '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 d-flex flex-fill flex-row justify-content-around col-12 col-lg-2 mb-3">' +
                '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center">';
            if (book.type == 'pista') {
                html += `<p class="align-self-lg-center text-center text-white bi bi-bookmark p-0 m-0 text-capitalize">${book.type}</p></div>`;
            }
            else {
                html += `<p class="align-self-lg-center text-center text-info bi bi-bookmark-star p-0 m-0">VIP</p></div>`;
            }
            if (book.status == 'waiting') {
                html += `<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center"><p class="align-self-lg-center text-center text-warning bi bi-hourglass-split p-0 m-0">En espera</p></div>`;
            }

            else if (book.status == 'accepted') {
                html += `<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center"><p class="align-self-lg-center text-center text-success bi bi-check p-0 m-0">Aceptada</p></div>`;
            }
            else {
                html += `<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center"><p class="align-self-lg-center text-center text-danger bi bi-x p-0 m-0">Cancelada</p></div>`;
            }
            html += `<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center"><div class="accordion accordion-flush" id="accordionFlushExample">` +

                `<div class="accordion-item">` +
                `<h2 class="accordion-header">` +
                `<p class="fw-lighter border rounded-5 fs-6 mb-0 text-white p-1 bi bi-eye px-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_${book.id}" aria-expanded="true" aria-controls="flush-collapseOne" data-target="name" ${(book.bottles_info) ? '' : 'hidden'}>` +
                ` Botellas</p>` +
                `</h2>` +
                `</div>` +
                `</div></div></div>` +
                `<div id="flush-collapseOne_${book.id}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" style="">` +
                `<div class="accordion-body">` +
                `<div class="form-outline form-white mb-4 col-3 col-md-4">` +
                `<p class="align-self-lg-center text-start p-0 m-0 text-capitalize">${book.bottles_info} </p>` +
                `<div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div></div></div>` +
                `</div>` +
                '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-2">' +
                '<div class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">' +
                `<button type="button" data-id="${book.id}" data-name="${book.name}" class=" fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button>`;

            if (role != 'normal') {
                html += `<button type="button" data-id="${book.id}" data-name="${book.name}" class="fs-2 bi bi-clipboard-check text-success bg-transparent border-0 confirm-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button>`
            }

            html += '</div></div></div></div>';
        }

        return html;

}


function completeModal(bookname, func) {
    if (func == 'delete') {
        $('#messageModal').append(`¿Está seguro que desea cancelar la reserva de ${bookname}?`);
    } else if (func == 'accept') {
        $('#messageModal').append(`¿Está seguro que desea confirmar la reserva de ${bookname}?`);
    }

}

function createAlert(action, bookName) {

    if (action == 'acceptbook') {
        toastr.success('La reserva se ha aceptado', '¡Aceptada!');
    } else if (action == 'cancelbook') {
        toastr.warning('La reserva ha sido cancelada.', '¡Cancelada!');
    }
}


