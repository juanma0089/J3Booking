@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/tables.js') }}
@endsection

@section('body')
    <div id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">


        <h1 class="text-center">Interior</h1>
        {{-- <p>Hay {{ $num_table }} mesas disponibles para reservar.</p> --}}

        <div class="row ">
            <div class="d-flex justify-content-center align-items-center p-0">
                <div class="mesa-rectangulo">
                    <img src="assets/img/dj.png" alt="escenario" class="img-fluid">
                </div>
            </div>

        </div>

        {{-- <div class="row d-flex justify-content-center align-content-center">
            <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                <h5>Fila 1</h5>
            </div>
            <div class="row row-cols-7">
                <div class="col d-flex justify-content-center p-0">
                    <button class="bg-transparent border-0 text-success m-0 p-0"><i
                            class="bi bi-square-fill mesa-icon"></i></button>
                </div>
                <div class="col d-flex justify-content-center  p-0">
                    <button class="bg-transparent border-0 text-success m-0 p-0"><i
                            class="bi bi-square-fill mesa-icon"></i></button>
                </div>
                <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                    <span class="h5 m-0 p-0">1</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 ">
                        <i class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
                <div class="col d-flex justify-content-center p-0">
                    <button class="bg-transparent border-0 text-success m-0 p-0"><i
                            class="bi bi-square-fill mesa-cruz"></i></button>
                </div>
                <div class="col d-flex justify-content-center p-0">
                    <button class="bg-transparent border-0 text-success m-0 p-0"><i
                            class="bi bi-square-fill mesa-cruz"></i></button>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-content-center">
                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 2</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 3</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 4</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>
                <hr class="col-12 text-white m-0">
                <span class=" text-center">Pasillo</span>
                <hr class="col-12 text-white m-0">
                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 5</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 6</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 7</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">3</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 ">
                            <i class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">2</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 ">
                            <i class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                </div> --}}


        {{-- <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                <h5>Sofás</h5>
            </div>
            <div class="col-12 justify-content-evenly align-content-center px-0 d-flex mb-sm-2 px-2">

                <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                    <span class="h5 m-0 p-0">3</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 ">
                        <i class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
                <div class="col-2 d-flex justify-content-center align-content-center p-1">
                    <span class="h5 m-0 p-0">2</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                            class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
                <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                    <span class="h5 m-0 p-0">1</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                            class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
            </div>
    </div> --}}

        {{--
            <hr class="col-12 text-white">


            <div class="row d-flex justify-content-center align-content-center mt-4">
                <h1 class="text-center">Exterior</h1>
                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 1</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>

                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 2</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">1</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                                class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>

                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 3</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 4</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-icon"></i></button>
                    </div>

                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Fila 5</h5>
                </div>
                <div class="col-12 justify-content-evenly align-content-center px-0 d-flex mb-sm-2 px-2">

                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">5</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 ">
                            <i class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-content-center p-1">
                        <span class="h5 m-0 p-0">4</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                                class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">3</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                                class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                        <span class="h5 m-0 p-0">2</span>
                        <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                                class="bi bi-displayport-fill mesa-icon"></i></button>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                    <h5>Opcionales</h5>
                </div>
                <div class="row row-cols-7">
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center  p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center p-0">
                        <button class="bg-transparent border-0 text-success m-0 p-0"><i
                                class="bi bi-square-fill mesa-cruz"></i></button>
                    </div>
                </div>
            </div>
        </div> --}}


        <button class="bg-transparent border-0 text-success m-0 p-0" data-bs-target="#exampleModalToggle"
            data-bs-toggle="modal"><i class="bi bi-square-fill mesa-icon" hidden></i></button>

        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog">
                <form action="" method="">
                    <div class="modal-content bg-custom text-white">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="exampleModalToggleLabel">Gestionar mesa</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <label class="mb-2 fs-3" for="">Asignar reserva</label>
                            <select class="form-select form-select bg-custom text-white"
                                aria-label=".form-select-sm example" size="1">
                                <option selected value="null" class="text-success">MESA LIBRE</option>
                                {{-- <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                            </select>
                            <label for="" class="mt-4 fs-3">Añadir botellas</i></label>
                            <div class="normalbottle">
                                <label for="" class="mt-4 fs-5"><i class="mx-2 bi bi-star"></i>Botellas
                                    normal</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="normalInput" class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantityNormalBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <label for="superbottle" class="mt-4 fs-5"><i class="mx-2 bi bi-star-half"></i>Botellas
                                    superior</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="superInput" class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantitySuperBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <label for="premiumbottle" class="mt-4 fs-5"><i class="mx-2 bi bi-star-fill"></i>Botellas
                                    premium</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="premiumInput" class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantityPremiumBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-evenly">
                            <p class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">Volver</p>
                            <button type="button"
                                class="btn btn-outline-light text-success border-success">Asignar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
