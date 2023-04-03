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

        html += '<tr><td><div class="d-flex align-items-center">' +
        '<div class="">' +
        `<p class="fw-bold mb-1">${user.name} ${user.surname ? user.surname : ''}</p>` +
        `<p class="text-muted mb-0">${user.email ? user.email : ''}</p>` +
        '</div></div></td>' +
        `<td class="jobtitle-usertable"><p class="fw-normal mb-1">${user.jobtitle ? user.jobtitle.toUpperCase() : ''}</p>` +
        '</td>' +
        `<td class="role-usertable"><span class="badge badge-success rounded-pill d-inline jobtitle-usertable">` +
        `${user.role.substr(0,1).toUpperCase()+user.role.substr(1)}</span></td>` + // Capitaliza el role poniendo la priimera mayúscula
        `<td class="phone-usertable">${user.phone ? user.phone : ''}</td>` +
        '<td><button type="button" class="btn btn-link btn-sm btn-rounded">Editar' +
        '</button></td></tr>';

        // TODO ENLACE EDITAR CON ID DEL USER
        
    }

    return html;
}

