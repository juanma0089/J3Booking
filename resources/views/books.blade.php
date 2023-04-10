@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/booklist.js') }}
@endsection

@section('body')
    <div id="mainPanel" class="container-fluid mt-4">

        <div>
            <h1 class="text-center">Reservas</h1>

            <div class="container">
                <form method="" action="" class="row d-flex justify-content-center align-items-center p-3">


                    <div class="col-12">
                        <label for="">Tramo</label>
                        <select class="form-select bg-custom text-white border-0" aria-label="horario">
                            <option value="all">Todos</option>
                            <option value="night">Noche</option>
                            <option value="afternoon">Tarde</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <label for="">Fecha</label>
                        <input class="form-control form-control-md bg-custom border-0 text-white border-dark" type="date" name="datepicker" id="datepicker"
                            value="2023-04-04">
                    </div>
                    <div class="col-2 p-0">
                        <button class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent text-white border-0"
                            type="submit">
                    </div>
                </form>

            </div>
        </div>
        <div id="lista_ac">


            <div class="p-0 d-flex justify-content-around p-lg-4 row  border-bottom">

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
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-none d-md-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Acciones</p>
                </div>

            </div>


        </div>
    </div>
@endsection
