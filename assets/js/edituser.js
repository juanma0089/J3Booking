function setCursorToEnd(el) {
    el.focus();
    if (typeof el.selectionStart == "number") {
      el.selectionStart = el.selectionEnd = el.value.length;
    } else if (typeof el.createTextRange != "undefined") {
      el.focus();
      var range = el.createTextRange();
      range.collapse(false);
      range.select();
    }
  }

  document.querySelectorAll('.accordion-button').forEach(function(button) {
    button.addEventListener('click', function() {
      var targetId = this.getAttribute('data-target');
      let input = document.getElementById(targetId);
      if (input) {
        setCursorToEnd(input);
      }
    });
  });

// $(function () {
//     $('#edituser').submit(function (e) {
//         e.preventDefault();

//         // Obtener los valores de los campos de entrada
//         var name = $('#name').val() ? $('#name').val() : '';
//         var surname = $('#surname').val() ? $('#surname').val() : '';
//         var email = $('#email').val() ? $('#email').val() : '';
//         var phone = $('#phone').val() ? $('#phone').val() : '';
//         var jobtitle = $('#jobtitle').val() ? $('#jobtitle').val() : '';
//         var role = $('#role').val() ? $('#role').val() : '';

//         errors = validateFields(name, surname, email, phone, jobtitle, role);

//         console.log(errors)
//         if (errors.length !== 0) {
//             $('#alertErrors').empty();
//             $('#alertErrors').removeAttr('hidden');

//             $.each(errors, function (index, value) {
//                 $('#alertErrors').prepend(
//                     `<li>${value}</li>`
//                 );
//             });

//         } else {
//             $('#alertErrors').empty();
//             $('#alertErrors').attr('hidden', 'true');

//             var csrfToken = $('input[name="_token"]').val();
//             var route = $('#edituser').attr('action')

//             $.ajax({
//                 url: route,
//                 type: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': csrfToken
//                 },
//                 data: {
//                     'name': name,
//                     'surname': surname,
//                     'email': email,
//                     'phone': phone,
//                     'jobtitle': jobtitle,
//                     'role': role
//                 },
//                 success: function (data) {
//                     // alert('Se ha creado el usuario con éxito.');
//                     $('#alertErrors').addClass('alert-success');
//                     $('#alertErrors').removeClass('alert-danger');
//                     $('#alertErrors').prepend('Usuario editado con éxito');
//                     $('#alertErrors').removeAttr('hidden');
//                 },
//                 error: function (jqXHR, textStatus, errorThrown) {
//                     // alert('Hubo un error al crear el usuario: ' + textStatus);
//                     if (jqXHR.status === 422) {
//                         var errors = jqXHR.responseJSON.errors;
//                         $('#alertErrors').empty();
//                         $('#alertErrors').removeAttr('hidden');
//                         $.each(errors, function (index, value) {
//                             $('#alertErrors').prepend(
//                                 `<li>${value}</li>`
//                             );
//                         });
//                     } else {
//                         alert('Hubo un error al editar el usuario: ' + textStatus);
//                     }
//                 }
//             });
//         }
//     });
// });
