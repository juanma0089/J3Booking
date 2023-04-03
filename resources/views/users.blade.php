@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container overflow-hidden">
            <table class="table align-middle mb-0 mt-5 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Rol</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
@endsection
