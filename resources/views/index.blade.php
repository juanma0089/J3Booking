@extends('templates.template')
@section('javascript')
    {{ asset('assets/js/tables.js') }}
@endsection
@section('body')
    <div id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">

        <div class="container-fluid d-flex flex-wrap justify-content-center justify-content-md-start m-0 p-0">

            {{-- Inicio Card --}}
            <section class="col-md-6 d-flex mb-2 p-1">
                <div
                    class="container d-flex flex-column flex-md-row col-12 bg-black bg-opacity-50 border border-2 border-white p-0">
                    {{-- Img --}}
                    <div
                        class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start align-content-center p-1">
                        <img src="assets/img/cartel_prueba.jpg" alt="" class="img-fluid img-event">
                    </div>
                    <div class="col-12 col-md-8 d-flex flex-column p-3 text-white card-container">
                        {{-- Date --}}
                        <h4 class="m-0">12/11/23</h4>
                        {{-- Tittle --}}
                        <h2 class="fw-bolder">Sábado noche: Open Day</h2>
                        {{-- Buttons --}}
                        <div
                            class="col-12 bg-transparent border-0 align-self-lg-center text-dark d-flex justify-content-evenly align-self-end">
                            <button
                                type="button"class=" fs-2 bi bi-x-lg text-danger bg-transparent border-0 delete-btn"></button>
                            <button type="button"
                                class="fs-2 bi bi-pencil-square text-warning bg-transparent border-0 confirm-btn"></button>
                            <button type="button"
                                class="fs-2 bi bi-box-arrow-right text-success bg-transparent border-0 confirm-btn"></button>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Fin Card --}}

        </div>
    </div>
@endsection
