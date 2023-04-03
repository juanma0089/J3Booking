@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container-fluid mt-4">
        <div id="lista_ac" class="p-2">


            <section class="p-0 d-flex justify-content-around row  border-bottom">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">
                    <p class="mb-0 opacity-75">Nombre / email
                    </p>
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
                    <p class="align-self-lg-center p-0 m-0">acciones</p>
                </div>

            </section>
            <div class="p-0 d-flex justify-content-around row  border-bottom text-white">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-8 col-md-3 p-lg-3 ">
                    <p class="mb-0 opacity-75 text-truncate">Antonio</p>
                    <p class="mb-0 opacity-75 text-truncate text-muted">AntonA@hotmail.com
                    </p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">RRPP</p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">Moderador</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-3 d-flex justify-content-center d-none d-md-flex">
                    <p class="align-self-lg-center p-0 m-0">992883412</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-4 col-md-2 d-flex justify-content-evenly bg-transparent">
                    <button type="submit" class="align-self-lg-center p-0 m-0 bi bi-pen text-warning bg-transparent border-0"></button>
                    <button type="submit" class="align-self-lg-center p-0 m-0 bi bi-x-lg text-danger bg-transparent border-0"></button>
                </div>

            </div>



    </section>
@endsection
