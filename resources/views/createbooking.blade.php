@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/register.js') }}
    {{ asset('assets/js/createbooking.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-3 mt-2 text-uppercase">Registrar nueva reserva</h3>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <?php
                                        toastr($error, 'error', 'Ops, ¡Error!');

                                        ?>
                                    @endforeach
                                @endif

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <div class="col-12 d-flex flex-row mb-4 justify-content-between gap-1 gap-md-0">
                                    <button class="btn btn-outline-light bg-success col-6 col-md-4" id='registerBtn'>
                                        {{ __('Reserva pista') }}</button>
                                    <a class="btn btn-outline-light bg-black col-6 col-md-4"
                                        href="{{ route('oldindex', ['id' => request()->route('id')]) }}" id='createVIP'>
                                        {{ __('Reserva VIP') }}</a>
                                </div>

                                <form method="POST" action="{{ route('bookingForm.create') }}" id='createbooking'>
                                    @csrf

                                    <input id="event_id" type="number" class="d-none" name="event_id"
                                        value="{{ request()->route('id') }}" required hidden readonly>

                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill " name="name"
                                                value="{{ old('name') }}" required autofocus>
                                            <label class="form-label" for="name">Nombre</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="surname" type="text"
                                                class="form-control form-control-lg no-autofill " name="surname"
                                                value="{{ old('surname') }}" required autofocus>
                                            <label class="form-label" for="surname">Apellidos</label>
                                        </div>


                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="diners" type="number"
                                                class="form-control form-control-lg no-autofill" name="diners"
                                                value="{{ old('diners') }}" required>
                                            <label class="form-label" for="diners">Nº de personas</label>
                                        </div>

                                        <div class="col-12 mb-4 ">
                                            <div class="d-flex justify-content-center">
                                                <button id="addbottle"
                                                    class="bg-success text-white btn-outline-white rounded-5 d-flex flex-row p-2 "
                                                    type="button">
                                                    <p class="py-0 m-0 fw-lighter">Añadir botella</p>
                                                    <i class="bi bi-plus-lg ms-1"></i>
                                                </button>
                                            </div>
                                        </div>


                                        {{-- <div class="col-12 gap-1 d-flex flex-row justify-content-between">
                                            <div class="col-9 text-white mb-4">
                                                <select
                                                    class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                    name="bottle_type_2" id='bottle_type' required>
                                                    <option value="" hidden selected>Tipo botella</option>
                                                    <option value="vip">VIP</option>
                                                    <option value="pista">Pista</option>
                                                </select>
                                            </div>
                                            <div class="col-3 text-white mb-4">
                                                <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="bottle_mount_2" id='bottle_mount' required>
                                                <option value="1"  selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            </div>
                                        </div> --}}

                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit" id='registerBtn'>
                                        {{ __('Registrar reserva') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
