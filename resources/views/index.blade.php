@extends('templates.template')
@section('javascript')
    {{ asset('assets/js/deleteevent.js') }}
@endsection

@section('body')
    <div id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">
        <div class="container-fluid d-flex flex-wrap justify-content-center justify-content-md-start m-0 p-0">

            @foreach ($eventos as $evento)
                @if (
                    $evento->eliminado == 0 &&
                        date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($evento->date . ' +1 day +10 hours')))
                    @php
                        $bookData = DB::table('books')
                            ->select(DB::raw('COUNT(*) as total_books'), DB::raw('SUM(diners) as total_diners'))
                            ->where('event_id', '=', $evento->id)
                            ->first();
                    @endphp

                    {{-- Inicio Card --}}
                    <section id='evento-{{ $evento->id }}' class="col-10 col-md-6 d-flex mb-2 p-1">
                        <div
                            class="container d-flex flex-column flex-md-row col-12 bg-black bg-opacity-50 border border-2 border-white p-0">
                            {{-- Img --}}
                            <div
                                class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start align-content-center p-1">
                                <img src="{{ asset('assets/img/events/' . $evento->image) }}" alt="{{ $evento->name }}"
                                    class="img-fluid img-event">

                            </div>
                            <div class="col-12 col-md-8 d-flex flex-column p-3 text-white card-container">
                                {{-- Date --}}
                                <div class='d-flex flex-row justify-content-between'>
                                    <h4 class="m-0">{{ $evento->date }}</h4>
                                    <p class="m-0">{{ ucfirst($evento->time) }}</p>
                                </div>
                                {{-- Tittle --}}
                                <div class='d-flex'>
                                    <h2 class="fw-bolder text-break">{{ $evento->name }}</h2>
                                </div>
                                <div class='d-flex flex-row justify-content-between'>
                                    <p class="fw-light text-break">{{ 'Reservas : ' . $bookData->total_books }}</p>
                                    <p class="fw-light text-break">{{ 'Asistentes : ' . $bookData->total_diners }}</p>
                                </div>
                                {{-- Buttons --}}
                                <div
                                    class="col-12 bg-transparent border-0 align-self-lg-center text-dark d-flex justify-content-evenly align-self-end">

                                    @if (Auth::user()->role == 'admin')
                                        <button type="button"
                                            class="fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn"
                                            data-bs-target="#exampleModalToggle-{{ $evento->id }}"
                                            data-bs-toggle="modal"></button>
                                        <a href="{{ route('editevent', ['id' => $evento->id]) }}"><button type="button"
                                                class="fs-2 bi bi-pencil-square text-warning bg-transparent border-0 confirm-btn"></button></a>
                                    @endif
                                    <a href="{{ route('booking', ['id' => $evento->id]) }}">
                                        <button type="button"
                                            class="fs-2 bi bi-person-plus text-success bg-transparent border-0 confirm-btn"></button></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Fin Card --}}
                    <div class="modal fade" id="exampleModalToggle-{{ $evento->id }}" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content bg-custom text-white">
                                <div class="modal-header border-0">
                                    <h5>Eliminar Evento</h5>
                                    <button id="btnClose1" type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <h6>¿Está seguro que desea eliminar el evento {{ $evento->name }} del día
                                        {{ $evento->date }} {{ $evento->time }}?</h6>

                                </div>
                                <div class="modal-body border-0">
                                    <p id="messageModal"></p>
                                </div>
                                <div class="modal-footer border-0 text-center p-4">
                                    <button id="btnClose2" type="button" data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-outline-light btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Volver</button>
                                    <button id="btnConfirmModal-{{ $evento->id }}" data-id="{{ $evento->id }}"
                                        data-name="{{ $evento->name }}" action='deleteevent' type="button"
                                        class="btn btn-outline-danger btn-md col-5 mx-1 my-3 my-md-0 col-md-4 text-center">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>


    </div>
@endsection
