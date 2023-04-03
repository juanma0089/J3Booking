$(function () {

    $('tbody').ready(function () {
        $.ajax({
            url: '/users',
            type: 'GET',
            data: {
                action: 'get_all_users'
            },
            success: function (response) {
                console.log(response); // hacer algo con la respuesta del servidor
                var html = pintarTabla(response)
                $('tbody').append(html)
            },
            error: function () {
                alert('Ha ocurrido un error al obtener los usuarios.');
            }
        });
    });

})

function pintarTabla(users) {
    html = '';
    for (let i = 0; i < users.length; i++) {
        const user = users[i];

        html += '<div class="p-0 d-flex justify-content-around row  border-bottom text-white">' +
        '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">' +
        `<p class="mb-0 opacity-75 text-truncate">${user.name} ${user.surname ? user.surname : ''}</p>` +
        `<p class="mb-0 opacity-75 text-truncate text-muted">${user.email}</p>` +
        '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
        `<p class="align-self-lg-center p-0 m-0">${user.jobtitle ? user.jobtitle.toUpperCase() : ''}</p>` +
        '</div><div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">' +
        `<p class="align-self-lg-center p-0 m-0">` +
        `${user.role.substr(0,1).toUpperCase()+user.role.substr(1)}</p></div>div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-evenly bg-transparent">` + // Capitaliza el role poniendo la priimera mayúscula
        `<p class="align-self-lg-center p-0 m-0">${user.phone ? user.phone : ''}</p></div><div class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-evenly bg-transparent">` +
        '<button type="submit" class="align-self-lg-center p-0 m-0 bi bi-pen text-warning bg-transparent border-0"></button>' +
        '<button type="submit" class="align-self-lg-center p-0 m-0 bi bi-x-lg text-danger bg-transparent border-0"></button></div> </div>';

        // TODO ENLACE EDITAR CON ID DEL USER

    }

    return html;
}

