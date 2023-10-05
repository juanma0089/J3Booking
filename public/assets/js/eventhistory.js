$(function () {

    // $('#lista_ac').ready(function () {
    //     ajaxQuery()
    // });

    $('#search').on('click', function () {
        ajaxQuery()
    })

})
//TODO : HACER FUCION ↓
function ajaxQuery() {

    $('.history').remove()

    let date = $("input[name='datepicker']").val() ? $("input[name='datepicker']").val() : 'all';

    $.ajax({
        url: '/eventhistory',
        type: 'GET',
        data: {
            action: 'getEventHistory',
            date: date,
            time: $("select[name='time']").val(),

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


function pintarTabla(events) {
    let html = '';

    console.log(events)
    for (let i = 0; i < events.length; i++) {
        const event = events[i];
            event.total_diners = (event.total_diners ?? 0);
            event.image = (event.image ? 'assets/img/events/'+event.image  : '');
            html += '<div class="p-0 d-flex justify-content-around row text-white border-bottom history">' +

            '<div class="col-4 col-md-4 d-flex justify-content-center justify-content-md-start align-content-center p-1">' +
            `<img src="${event.image}" alt="Evento 1" class="img-fluid img-event">` +
            '</div>' +
            '<div class="d-flex pt-2 px-lg-2 px-sm-0 px-md-1 flex-fill row col-8 col-lg-3 p-lg-3 text-wrap">' +
            '<div class="pt-2 px-lg-2 px-sm-0 px-md-1 flex-fill col-6 col-lg-3 p-lg-3 text-wrap">' +
            `<p class="align-self-lg-center p-0 m-0 opacity-75 fw-bolder">Datos</p>`+
            `<p class="p-0 m-0">${event.name}</p>` +
            `<p class="p-0 m-0">${event.time}</p>` +
            `<p class="p-0 m-0">${event.date}</p>` +
            `<p class="p-0 m-0">Reservas: ${event.total_books}</p>` +
            `<p class="p-0 m-0">Asistentes: ${event.total_diners}</p>` +
            '</div>' +
            '<div class="pt-2 px-lg-2 px-sm-0 px-md-1 flex-fill col-6 col-lg-2 p-lg-3 text-wrap">' +
            `<p class="align-self-lg-center p-0 m-0 opacity-75 fw-bolder">Botellas VIP</p>`+
            `<p class="align-self-lg-center p-0 m-0 fw-lighter">Escenario: ${event.min_vip_esc}</p>`+
            `<p class="align-self-lg-center p-0 m-0 fw-lighter">Mesa: ${event.min_vip_mesa}</p>`+
            `<p class="align-self-lg-center p-0 m-0 fw-lighter">Mesa alta: ${event.min_vip_mesaalta}</p>`+
            '</div>' +
            '<div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">' +
            ' <a class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">'+
            '<span class="text-secondary border rounded p-1"><i class="bi bi-people fs-3"></i> Ver reservas</span></a></div></div>'+
            '</div>';
    }

    return html;
}


function completeModal(bookname) {
    $('#messageModal').append(`¿Está seguro que desea cancelar la reserva de ${bookname}?`);
}
