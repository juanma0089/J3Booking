// $(function () {
//     $('#register').submit(function (e) {
//         e.preventDefault();

//         // Obtener los valores de los campos de entrada
//         var name = $('#name').val() ? $('#name').val() : '';
//         var surname = $('#surname').val() ? $('#surname').val() : '';
//         var email = $('#email').val() ? $('#email').val() : '';
//         var phone = $('#phone').val() ? $('#phone').val() : '';
//         var jobtitle = $('#jobtitle').val() ? $('#jobtitle').val() : '';
//         var role = $('#role').val() ? $('#role').val() : '';

//         errors = validateFields(name, surname, email, phone, jobtitle, role);

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
//             var route = $('#register').attr('action')

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
//                     $('#alertErrors').prepend('Usuario creado con éxito');
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
//                         alert('Hubo un error al crear el usuario: ' + textStatus);
//                     }
//                 }
//             });
//         }
//     });
// });
