@extends('templates.template')

@section('body')
    <div id="mainPanel" class="container-fluid mt-4">

        <div>
            <h1 class="text-center">Reservas</h1>

            <div class="container">
                <form method="" action="" class="row d-flex justify-content-center align-items-center p-3">


                    <div class="col-10">
                        <input class="form-control form-control-md" type="date" name="datepicker" id="datepicker"
                            value="2023-04-04">
                    </div>
                    <div class="col-2 p-0">
                        <button class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent border-0"
                            type="submit">
                    </div>
                </form>

            </div>
        </div>
        <div id="lista_ac">


            <div class="p-0 d-flex justify-content-around row  border-bottom">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-4 p-lg-3 ">
                    <p class="mb-0 opacity-75">Cliente
                    </p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Personas</p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Rrpp</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Botellas</p>
                </div>

            </div>

            <div class="p-0 d-flex justify-content-around row py-1 text-white border-bottom">

                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-4 p-lg-3 text-start text-wrap">
                    <p class="mb-0 opacity-75">Pepito el de los palotes
                    </p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div
                    class="align-self-center p-0 px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">Antoni rrpp</p>
                </div>
                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">
                    <a class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">
                        <i class="bi bi-x-lg text-danger fs-2"></i>
                        <i class="bi bi-clipboard-check text-success fs-2"></i>
                    </a>
                </div>
            </div>
            <div class="p-0 d-flex justify-content-around row py-1 text-white border-bottom">

                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-4 p-lg-3 text-start text-wrap">
                    <p class="mb-0 opacity-75">Pepito el de los palotes
                    </p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div
                    class="align-self-center p-0 px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">Antoni rrpp</p>
                </div>
                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">
                    <a class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">
                        <i class="bi bi-x-lg text-danger fs-2"></i>
                        <i class="bi bi-clipboard-check text-success fs-2"></i>
                    </a>
                </div>
            </div>
            <div class="p-0 d-flex justify-content-around row py-1 text-white border-bottom">

                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-5 col-lg-4 p-lg-3 text-start text-wrap">
                    <p class="mb-0 opacity-75">Pepito el de los palotes
                    </p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div
                    class="align-self-center p-0 px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">Antoni rrpp</p>
                </div>
                <div
                    class="align-self-center px-3 px-lg-2 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center text-start">
                    <p class="align-self-lg-center p-0 m-0">3</p>
                </div>
                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-12 col-lg-1">
                    <a class="bg-transparent border-0 align-self-lg-center p-3 text-dark d-flex justify-content-evenly">
                        <i class="bi bi-x-lg text-danger fs-2"></i>
                        <i class="bi bi-clipboard-check text-success fs-2"></i>
                    </a>
                </div>
            </div>


        </div>
        {{-- <p>Hay {{ $prueba }} mesas disponibles para reservar.</p> --}}








    </div>
@endsection
