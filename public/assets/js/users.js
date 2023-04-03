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
                $('tbody').append(pintarTabla())
            },
            error: function () {
                alert('Ha ocurrido un error al obtener los usuarios.');
            }
        });
    });

})

function pintarTabla(users) {
    html = '';
    for (const user in users) {
        html += '<tr><td><div class="d-flex align-items-center">' +
        '<img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""style="width: 45px; height: 45px" class="rounded-circle" />' +
        '<div class="ms-3">' +
        '<p class="fw-bold mb-1">John Doe</p>' +
        '<p class="text-muted mb-0">john.doe@gmail.com</p>' +
        '</div></div></td>' +
        '<td><p class="fw-normal mb-1">Software engineer</p>' +
        '<p class="text-muted mb-0">IT department</p></td>' +
        '<td><span class="badge badge-success rounded-pill d-inline">Active</span></td>' +
        '<td>Senior</td>' +
        '<td><button type="button" class="btn btn-link btn-sm btn-rounded">Editar' +
        '</button></td></tr>';
    }

    return html;
}

