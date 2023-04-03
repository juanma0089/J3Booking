@extends('templates.template')

@section('body')
    <div id="mainPanel" class="container min-vh-100">


        <h1>Interior</h1>
        {{-- <p>Hay {{ $prueba }} mesas disponibles para reservar.</p> --}}

        <div class="row ">
            <div class="col-12 px-0 d-flex mb-sm-2">
                <h5 class="px-2">Fila 1</h5>
            </div>
            <div class="col-2 col-md-4 d-flex flex-column justify-content-center align-items-center">
              <button class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-icon"></i></button>
              <button class="bg-transparent border-0 text-success m-0 p-0"><i class="bi bi-square-fill mesa-icon"></i></button>
            </div>
            <div class="col-8 col-md-8 d-flex justify-content-center align-items-center p-0">
              <div class="mesa-rectangulo">
                <img src="https://via.placeholder.com/120x50" alt="escenario" class="img-fluid">
              </div>
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
            <div class="col-12 px-0 d-flex mb-sm-2 px-2">
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

        </div>
        <hr class="col-12 text-white">
        <div class="row d-flex justify-content-center align-content-center">
            <h1>Exterior</h1>
            <div class="col-12 px-0 d-flex mb-sm-2 px-2">
                <h5>Fila</h5>
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
                <h5>Fila</h5>
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
                <h5>Fila</h5>
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
                <h5>Sofás</h5>
            </div>
            <div class="col-12 justify-content-evenly align-content-center px-0 d-flex mb-sm-2 px-2">

                <div class="col-2 d-flex justify-content-center align-content-center  p-1">
                    <span class="h5 m-0 p-0">4</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 ">
                        <i class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
                <div class="col-2 d-flex justify-content-center align-content-center p-1">
                    <span class="h5 m-0 p-0">3</span>
                    <button class="bg-transparent border-0 text-success m-0 p-0 "><i
                            class="bi bi-displayport-fill mesa-icon"></i></button>
                </div>
                <div class="col-2 d-flex justify-content-center align-content-center  p-1">
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
        </div>
    </div>
@endsection
