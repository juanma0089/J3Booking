@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container-fluid mt-4">
        <div class="card-body text-center">
            <div>
                <h3 class="fw-bold my-2 text-uppercase">Usuarios</h3>
            </div>
        </div>

        <div id="lista_ac" class="p-2">

            <section class="p-0 d-flex justify-content-around row  border-bottom">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">
                    <p class="align-self-lg-center p-0 m-0">Nombre</p>
                </div>

                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">Puesto</p>
                </div>

                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">Rol</p>
                </div>

                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-3 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">Teléfono</p>
                </div>

                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Acciones</p>
                </div>

            </section>

    </section>
@endsection
