$(function () {

    $('#lista_ac').ready(function () {
        ajaxQuery()
    });

    $('#search').on('click', function () {
        ajaxQuery()
    })

    // $("#btnClose1, #btnClose2, #btnDelete").on('click', function () {
    //     $('#messageModal').empty();
    // })

})

function ajaxQuery() {
    $('.book').remove()
    $.ajax({
        url: '/books',
        type: 'GET',
        data: {
            action: 'getpendingbooks',
            date:  $("input[name='datepicker']").val(),
            time: $("select[name='time']").val()
        },
        success: function (response) {
            var html = pintarTabla(response)
            $('#lista_ac').append(html)

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


        html += '<div class="p-0 p-lg-3 d-flex justify-content-around row text-white border-bottom book">'+

        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-5 p-lg-3 text-wrap">'+
            `<p class="mb-0 opacity-75">${book.name}</p>`+
        '</div>'+
        '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">'+
            `<p class="align-self-lg-center p-0 m-0">${book.diners}</p>`+
        '</div>'+
        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center">'+
        `<p class="align-self-lg-center text-center  p-0 m-0">${book.rrpp}</p>`+
        '</div>'+
        // '<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">'+
        // `<p class="align-self-lg-center p-0 m-0">pendiente</p>`+
        // '</div>'+
        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-2">'+
        '<div class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">'+
        `<button type="button" data-id="${book.id}" data-name="${book.name}" class=" fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button>`+
        `<button type="button" data-id="${book.id}" class=" fs-2 bi bi-clipboard-check text-success bg-transparent border-0 edit-btn"></button>` +
        '</div></div></div>';
    }

    return html;
}


// function completeModal(userId, userName) {
//     $('#messageModal').append(`¿Está seguro que desea eliminar el usuario ${userName}?`);
// }
