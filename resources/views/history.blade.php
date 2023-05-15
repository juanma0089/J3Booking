@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/history.js') }}
@endsection

@section('body')
    <div id="mainPanel" class="container-fluid mt-4">

        <div>
            <h1 class="text-center">Historial de Reservas</h1>

            <div class="container">
                <form method="" action="" class="row d-flex justify-content-center align-items-center p-3">


                    <div class="col-12">
                        <label for="">Tramo</label>
                        <select class="form-select bg-custom text-white border-0" aria-label="horario" name="time"
                            id="time">
                            <option value="all">Noche/Tarde</option>
                            <option value="night">Noche</option>
                            <option value="afternoon">Tarde</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">Estado</label>
                        <select class="form-select bg-custom text-white border-0" aria-label="status" name="status"
                            id="status">
                            <option value="all">Todos</option>
                            <option value="cancelled">Cancelada</option>
                            <option value="waiting">En espera</option>
                            <option value="accepted">Aceptada</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <label for="">Fecha</label>
                        <input class="form-control form-control-md bg-custom border-0 text-white border-dark" type="date"
                            name="datepicker" id="datepicker" value="">
                    </div>
                    <div class="col-2 p-0 d-flex align-self-end">
                        <button id="search"
                            class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent text-white border-0"
                            type="button">
                    </div>
                </form>

            </div>
        </div>
        <div id="lista_ac">

            <div class="p-0 d-flex justify-content-around row text-white border-bottom">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-4 p-lg-3 text-wrap">
                    <p class="mb-0 opacity-75 text-muted">Cliente</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center text-muted p-0 m-0">Personas</p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center text-center text-muted p-0 m-0">Rrpp</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0 text-muted">Botellas</p>
                </div>
                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill d-none d-lg-flex col-12 col-lg-1">
                    <a class="bg-transparent border-0 align-self-lg-center p-3 text-muted d-flex justify-content-evenly">
                        Acciones</a>
                </div>
            </div>

        </div>
    </div>
@endsection
