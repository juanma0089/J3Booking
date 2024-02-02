$(function () {

    $("#btnClose1, #btnClose2").on('click', function () {
        $('#messageModal').empty();
    });

   

    $('[id^="btnConfirmModal-"]').on('click', function () {
        let eventId = $(this).attr('data-id');
        
        $.ajax({
            url: '/deleteevent/' + eventId, // Asegúrate de que eventId esté definido y tenga el valor correcto
            type: 'GET',
            success: function () {
                $("#btnClose1").click();
                
                window.location.href = '/';
            },
            error: function () {
                alert('Ha ocurrido un error.');
            }
        });
    });
    


})

function ajaxQuery(action) {

    $('.book').remove()

    $.ajax({
        url: '/index',
        type: 'GET',
        data: {
            action: 'getbooks',
            date: $("input[name='datepicker']").val(),
            time: $("select[name='time']").val()
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

function completeModal(bookname, func) {
    if (func == 'delete') {
        $('#messageModal').append(`¿Está seguro que desea cancelar la reserva de ${bookname}?`);
    } else if (func == 'accept') {
        $('#messageModal').append(`¿Está seguro que desea confirmar la reserva de ${bookname}?`);
    }

}