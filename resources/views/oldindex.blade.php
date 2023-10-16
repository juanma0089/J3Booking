@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/tables.js') }}
@endsection

@section('body')
    <div id="mainPanel" idevent='{{ request()->route('id') }}'
        class="container overflow-y-auto overflow-x-hidden position-relative py-4">


        <h1 class="text-center fw-lighter ">Selecciona una mesa</h1>
        @php
            $bottles = DB::table('events')
                ->select('min_vip_esc', 'min_vip_mesa', 'min_vip_mesaalta')
                ->where('id', '=', request()->route('id'))
                ->get();
            foreach ($bottles as $bottle) {
                // Accede a las columnas deseas como propiedades del objeto
                $minVipEsc = $bottle->min_vip_esc;
                $minVipMesa = $bottle->min_vip_mesa;
                $minVipMesaAlta = $bottle->min_vip_mesaalta;
            }
        @endphp
        <p id="minVipEsc" minVipEsc='{{ $minVipEsc }}' class='d-none'>botella 1</p>
        <p id="minVipMesa" minVipMesa='{{ $minVipMesa }}' class='d-none'>botella 2</p>
        <p id="minVipMesaAlta" minVipMesaAlta='{{ $minVipMesaAlta }}' class='d-none'>botella 3</p>
        <button id='btn-modal' class="bg-transparent border-0 text-success m-0 p-0" data-bs-target="#modal-table"
            data-bs-toggle="modal"></button>

        <div class="modal fade" id="modal-table" aria-hidden="true" aria-labelledby="modal-table-label" tabindex="-1">
            <div class="modal-dialog">
                <form action="" method="">
                    <div class="modal-content bg-custom text-white">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="modal-table-label">Gestionar mesa</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div id='modalBody' class="modal-body">

                            <label class="mb-2 fs-3" for="">Asignar reserva</label>
                            <select id='selectAcceptedBooks' class="form-select form-select bg-custom text-white"
                                aria-label=".form-select-sm example" size="1">
                            </select>
                            <label for="" class="mt-4 fs-3">Añadir botellas</i></label>
                            <div class="normalbottle">
                                <label for="" class="mt-4 fs-5"><i class="mx-2 bi bi-star"></i>Botellas
                                    normal</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="normalInput"
                                        class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantityNormalBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <label for="superbottle" class="mt-4 fs-5"><i class="mx-2 bi bi-star-half"></i>Botellas
                                    superior</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="superInput"
                                        class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantitySuperBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <label for="premiumbottle" class="mt-4 fs-5"><i class="mx-2 bi bi-star-fill"></i>Botellas
                                    premium</label>
                                <div class="d-flex justify-content-evenly align-items-center my-2">
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="bi bi-dash-lg text-danger fs-3"></i>
                                    </span>
                                    <input id="premiumInput"
                                        class="form-control bg-transparent border-0 text-center w-25 text-light"
                                        type="number" min="0" value="0" name="quantityPremiumBottle" readonly>
                                    <span type="button" class="btn shadow-none py-0 px-2 m-0 bg-transparent border-0"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="bi bi-plus-lg text-success fs-3"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-evenly">
                            <p class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">Volver</p>
                            <button type="button" id='assignTable'
                                class="btn btn-outline-light text-success border-success"
                                data-bs-dismiss="modal">Asignar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
