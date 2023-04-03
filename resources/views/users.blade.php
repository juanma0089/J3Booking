@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container align-middle">
            <table class="table usertable align-middle mb-0 mt-5 bg-custom text-white">
                <thead class="bg-custom">
                    <tr>
                        <th class="name-head-usertable">Nombre</th>
                        <th class="jobtitle-head-usertable d-none d-md-table-cell">Puesto</th>
                        <th class="role-head-usertable d-none d-md-table-cell">Rol</th>
                        <th class="phone-head-usertable d-none d-md-table-cell">Teléfono</th>
                        <th class="actions-head-usertable">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
@endsection
