@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container-fluid mt-4">
        <div class="card-body text-center">
            <div>
                <h3 class="fw-bold my-2 text-light text-uppercase">Usuarios</h3>
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('register') }}"><button type="button" class="mx-2 btn btn-sm btn-success">
                                <i class="bi bi-plus-lg"></i>
                                Usuario
                            </button>
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        <div id="usersList" class="p-2">

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

            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content bg-custom text-white">
                        <div class="modal-header border-0">
                            <h5>Eliminar usuario</h5>
                            <button id="btnClose1" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body border-0">
                            <p id="messageModal"></p>
                        </div>
                        <div class="modal-footer border-0 text-center p-4">
                            <button id="btnClose2" type="button" data-bs-dismiss="modal" aria-label="Close"
                                class="btn btn-outline-light btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Volver</button>
                            <button id="btnDelete" type="submit"
                                class="btn btn-outline-danger btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
