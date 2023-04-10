$(function () {

    $('#usersList').ready(function () {
        $.ajax({
            url: '/users',
            type: 'GET',
            data: {
                action: 'get_all_users'
            },
            success: function (response) {
                let html = pintarTabla(response)
                $('#usersList').append(html)

                $('.edit-btn').on('click', function () {
                    let userId = $(this).attr('data-id');
                    window.location.href = 'edituser/' + userId;
                })

                $('.delete-btn').on('click', function () {
                    let userName = $(this).attr('data-name')
                    $("#btnDeleteUser").attr('user-id', $(this).attr('data-id'));
                    completeModal(userName)
                })
            },
            error: function () {
                alert('Ha ocurrido un error al obtener los usuarios.');
            }
        });
    });

    $("#btnClose1, #btnClose2").on('click', function () {
        $('#messageModal').empty();
        $("#btnDeleteUser").removeAttr('user-id');
    });

    $("#btnDeleteUser").on('click', function () {
        let userId = $(this).attr('user-id');
        console.log(userId);

        $.ajax({
            url: '/users',
            type: 'GET',
            data: {
                action: 'delete_user',
                id: userId
            },
            success: function (response) {
                location.reload();
            },
            error: function () {
                alert('Ha ocurrido un error al eliminar el usuario.');
            }
        });
    });

})

function pintarTabla(users) {
    let html = '';
    for (let i = 0; i < users.length; i++) {
        const user = users[i];

        html += '<div class="p-0 d-flex justify-content-around row  border-bottom text-white">' +
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">' +
            `<p class="align-self-lg-center p-0 m-0 text-truncate">${user.name} ${user.surname ? user.surname : ''}</p>` +
            `<p class="align-self-lg-center p-0 m-0 text-truncate text-muted">${user.email}</p>` +
            '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
            `<p class="align-self-lg-center p-0 m-0">${user.jobtitle ? user.jobtitle.toUpperCase() : ''}</p>` +
            '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
            `<p class="align-self-lg-center p-0 m-0">` +
            `${user.role.substr(0, 1).toUpperCase() + user.role.substr(1)}</p></div>` +
            `<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-3 d-flex justify-content-center d-none d-md-flex">` + // Capitaliza el role poniendo la priimera mayúscula
            `<p class="align-self-lg-center p-0 m-0">${user.phone ? user.phone : ''}</p></div>` +
            `<div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-evenly bg-transparent">` +
            `<button type="button" data-id="${user.id}" class="align-self-lg-center p-0 m-0 bi bi-pen text-warning bg-transparent border-0 edit-btn"></button>` +
            `<button type="button" data-id="${user.id}" data-name="${user.name}" class="align-self-lg-center p-0 m-0 bi bi-x-lg text-danger bg-transparent border-0 delete-btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"></button></div></div>`;

    }

    return html;
}

function completeModal(userName) {
    $('#messageModal').append(`¿Está seguro que desea eliminar el usuario ${userName}?`);
}
