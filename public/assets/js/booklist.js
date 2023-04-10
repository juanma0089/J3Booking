$(function () {

    $('#lista_ac').ready(function () {
        $.ajax({
            url: '/books',
            type: 'GET',
            data: {
                action: 'getallbook'
            },
            success: function (response) {
                var html = pintarTabla(response)
                $('#lista_ac').append(html)

                // $('.edit-btn').on('click', function () {
                //     let userId = $(this).attr('data-id');
                //     window.location.href = 'edituser/' + userId;
                // })

                // $('.delete-btn').on('click', function () {
                //     let userName = $(this).attr('data-name')
                //     let userId = $(this).attr('data-id');
                //     completeModal(userId, userName)
                // })
            },
            error: function () {
                alert('Ha ocurrido un error al obtener las reservas.');
            }
        });
    });

    // $("#btnClose1, #btnClose2, #btnDelete").on('click', function () {
    //     $('#messageModal').empty();
    // })

})

function pintarTabla(books) {
    html = '';
    for (let i = 0; i < books.length; i++) {
        const book = books[i];


        html += '<div class="p-0 d-flex justify-content-around row py-1 text-white border-bottom">'+

        '<div class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-4 p-lg-3 text-start text-wrap">'+
            `<p class="mb-0 opacity-75">${book.name}</p>`+
        '</div>'+
        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">'+
            `<p class="align-self-lg-center p-0 m-0">${book.diners}</p>`+
        '</div>'+
        '<div class="align-self-center p-0 px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center text-start">'+
        `<p class="align-self-lg-center p-0 m-0">${book.user_id}</p>`+
        '</div>'+
        '<div class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">'+
        `<p class="align-self-lg-center p-0 m-0">pendiente</p>`+
        '</div>'+
        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">'+
        '<div class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">'+
        `<button type="button" data-id="${book.id}" data-name="${book.name}" class=" fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button>`+
        `<button type="button" data-id="${book.id}" class=" fs-2 bi bi-clipboard-check text-success bg-transparent border-0 edit-btn"></button>` +
        '</div></div></div>';

        // html += '<div class="p-0 d-flex justify-content-around row  border-bottom text-white">' +
        //     '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">' +
        //     `<p class="align-self-lg-center p-0 m-0 text-truncate">${user.name} ${user.surname ? user.surname : ''}</p>` +
        //     `<p class="align-self-lg-center p-0 m-0 text-truncate text-muted">${user.email}</p>` +
        //     '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
        //     `<p class="align-self-lg-center p-0 m-0">${user.jobtitle ? user.jobtitle.toUpperCase() : ''}</p>` +
        //     '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
        //     `<p class="align-self-lg-center p-0 m-0">` +
        //     `${user.role.substr(0, 1).toUpperCase() + user.role.substr(1)}</p></div>` +
        //     `<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-3 d-flex justify-content-center d-none d-md-flex">` + // Capitaliza el role poniendo la priimera mayúscula
        //     `<p class="align-self-lg-center p-0 m-0">${user.phone ? user.phone : ''}</p></div>` +
        //     `<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-evenly bg-transparent">` +
        //     `<button type="button" data-id="${user.id}" class="align-self-lg-center p-0 m-0 bi bi-pen text-warning bg-transparent border-0 edit-btn"></button>` +
        //     `<button type="button" data-id="${user.id}" data-name="${user.name}" class="align-self-lg-center p-0 m-0 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button></div></div>`;

        // TODO DELETE USER

    }

    return html;
}


// function completeModal(userId, userName) {
//     $('#messageModal').append(`¿Está seguro que desea eliminar el usuario ${userName}?`);
// }
