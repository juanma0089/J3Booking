@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container">
            <table class="table align-middle mb-0 mt-5 bg-custom text-white">
                <thead class="bg-custom">
                    <tr>
                        <th class="name-head-usertable">Nombre</th>
                        <th class="jobtitle-head-usertable">Puesto</th>
                        <th class="role-head-usertable">Rol</th>
                        <th class="phone-head-usertable">Teléfono</th>
                        <th class="actions-head-usertable">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
@endsection
