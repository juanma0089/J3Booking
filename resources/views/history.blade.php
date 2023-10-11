@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/history.js') }}
@endsection

@section('body')
    <div id="mainPanel" class="container-fluid mt-4">

        <div class="mt-4">

            <div class="container">
                <form method="" action="" class="row d-flex justify-content-center align-items-center p-3">


                    <div class="col-12">
                        <label for="">Rrpp</label>
                        <select class="form-select bg-custom text-white border-0" aria-label="rrpp" name="rrpp"
                            id="rrpp">
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
                    <div class="col-10">
                        <label for="">Estado</label>
                        <select class="form-select bg-custom text-white border-0" aria-label="status" name="status"
                            id="status">
                            <option value="all" selected>Todos</option>
                            <option value="cancelled">Cancelada</option>
                            <option value="waiting">En espera</option>
                            <option value="accepted">Aceptada</option>
                        </select>
                    </div>
                    <div class="col-2 p-0 d-flex align-self-end">
                        <button id="search"
                            class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent text-white border-0"
                            type="button">
                    </div>
                </form>
                <a id="book-link" href="{{ route('editbook', ['id' => ':bookId']) }}" class="d-none"></a>
            </div>
            @php
                $eventId = request('id');
                $reservas = DB::table('books')
                    ->where('event_id', $eventId)
                    ->where('status', 'accepted')
                    ->selectRaw('COUNT(*) as count, SUM(diners) as sum_diners')
                    ->first();
                $reservas->count = $reservas->count ?? 0;
                $reservas->sum_diners = $reservas->sum_diners ?? 0;
            @endphp
            <div class="p-0 d-flex justify-content-around row text-white">
                <div
                    class="align-self-center px-lg-2 py-3 px-sm-0 px-md-1 flex-fill col-2 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center text-muted p-0 m-0">Aceptadas: {{ $reservas->count }}</p>
                </div>
                <div
                    class="align-self-center px-lg-2 px-sm-0 px-md-1 flex-fill col-3 col-lg-2 d-flex justify-content-center">
                    <p class="align-self-lg-center text-center text-muted p-0 m-0">Asistentes reales:
                        {{ $reservas->sum_diners }}</p>
                </div>
            </div>
            <h1 class="text-center fs-6">Historial de Reservas</h1>
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

            </div>
            @if ('auth')
                <div id="roleuser" role='{{ Auth::user()->role }}' user_id='{{ Auth::user()->id }}' hidden></div>
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
    </div>
@endsection
