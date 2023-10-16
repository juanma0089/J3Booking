@extends('templates.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
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
                        <label for="event">Evento</label>
                        <select name="event" class="form-select bg-custom text-white border-0" aria-label="event">
                            {{-- <option value="" selected></option> --}}
                            @php
                                $events = DB::table('events')
                                    ->select('id', 'name', 'date', 'time')
                                    ->where('date', '>', now()->subDay()) // Filtrar eventos que no han pasado más de un día
                                    ->orderBy('date', 'asc')
                                    ->where('eliminado', 0)
                                    ->get();
                            @endphp
                            @if ($events)
                                @foreach ($events as $event)
                                    @php
                                        $formattedDate = date('d/m/Y', strtotime($event->date));
                                    @endphp

                                    <option value="{{ $event->id }}">
                                        {{ $event->name . ' - ' . ucfirst($event->time) . ' ' . $formattedDate }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-10">
                        <label for="rrpp">RRPP</label>
                        <select name="rrpp" class="form-select bg-custom text-white border-0" aria-label="rrpp">
                            <option value="all" selected>Todos</option>
                            @php
                                $rrpp = DB::table('users')
                                    ->select('id', 'name', 'surname')
                                    ->orderBy('name', 'asc') // Ordenar por fecha ascendente
                                    ->get();
                            @endphp
                            @if ($rrpp)
                                @foreach ($rrpp as $person)
                                    <option value="{{ $person->id }}">
                                        {{ ucfirst($person->name) . ' ' . ucfirst($person->surname) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-2 p-0 d-flex align-self-end">
                        <button id="search"
                            class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent text-white border-0 "
                            type="button">
                    </div>
                </form>

            </div>
        </div>
        <div id="lista_ac">

            <div class="p-0 d-flex justify-content-around p-lg-3 row  border-bottom">

                <div class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-5 p-lg-3 ">
                    <p class="mb-0 opacity-75">Cliente</p>
                </div>
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Personas</p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-4 col-lg-3 d-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Rrpp</p>
                </div>

                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-none d-md-flex justify-content-center">
                    <p class="align-self-lg-center p-0 m-0">Info</p>
                </div>

            </div>

        </div>


        @if ('auth')
            <div id="roleuser" role='{{ Auth::user()->role }}' hidden></div>
        @endif

    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-custom text-white">
                <div class="modal-header border-0">
                    <h5>Cancelar Reserva</h5>
                    <button id="btnClose1" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <p id="messageModal"></p>
                </div>
                <div class="modal-footer border-0 text-center p-4">
                    <button id="btnClose2" type="button" data-bs-dismiss="modal" aria-label="Close"
                        class="btn btn-outline-light btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Volver</button>
                    <button id="btnConfirmModal" type="button"
                        class="btn btn-outline-danger btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
