@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/eventhistory.js') }}
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
                            <option value="all">Todos</option>
                            <option value="noche">Noche</option>
                            <option value="tarde">Tarde</option>
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

            <div class="p-0 d-flex justify-content-center row text-white border-bottom">

                <p class="mb-1 opacity-75 text-muted text-center"> Historial de eventos</p>

            </div>
            <a id="evento-link" href="{{ route('books', ['id' => ':eventoId']) }}" class="d-none">aas</a>

        </div>
    </div>
@endsection
