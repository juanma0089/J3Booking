@extends('templates.template')

@section('javascript')
    {{-- {{ asset('assets/js/register.js') }} --}}
    {{ asset('assets/js/createevent.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-3 mt-2 text-uppercase">Crear nuevo evento</h3>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <?php
                                        toastr($error, 'error', 'Ops, ¡Error!');
                                        ?>
                                    @endforeach
                                @endif

                                {{-- Realizar ruta para action --}}
                                <form method="POST" action="{{ route('eventForm.create') }}" enctype="multipart/form-data"
                                    id='createevent'>
                                    @csrf
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill " name="name"
                                                value="{{ old('name') }}" required autofocus>
                                            <label class="form-label" for="name">Título</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="min_vip_esc" type="number"
                                                class="form-control form-control-lg no-autofill" name="min_vip_esc"
                                                value="{{ old('min_vip_esc') ? old('min_vip_esc') : 2 }}" min="0"
                                                required>
                                            <label class="form-label" for="min_vip_esc">Mín. botellas VIP Escenario</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="min_vip_mesa" type="number"
                                                class="form-control form-control-lg no-autofill" name="min_vip_mesa"
                                                value="{{ old('min_vip_mesa') ? old('min_vip_mesa') : 3 }}"min="0"
                                                required>
                                            <label class="form-label" for="min_vip_mesa">Mín. botellas VIP Mesas</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="min_vip_mesaalta" type="number"
                                                class="form-control form-control-lg no-autofill" name="min_vip_mesaalta"
                                                value="{{ old('min_vip_mesaalta') ? old('min_vip_mesaalta') : 1 }}"min="0"
                                                required>
                                            <label class="form-label" for="min_vip_mesaalta">Mín. botellas VIP Mesas
                                                Altas</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="date" type="date"
                                                class="form-control form-control-lg no-autofill" name="date"
                                                value="{{ old('date') }}" required>
                                            <label class="form-label" for="date">Fecha</label>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="time" id='time' required>
                                                <option value="" hidden selected>Turno</option>
                                                <option value="tarde">Tarde</option>
                                                <option value="noche">Noche</option>
                                            </select>
                                        </div>

                                        <div
                                            class="form-outline form-white border border-white rounded-top border-bottom-0 col-3 col-md-4">
                                            <label class="" for="image">Imagen del evento</label>
                                        </div>
                                        <div
                                            class="form-outline form-white border border-white rounded-bottom mb-4 col-3 col-md-4">
                                            <input id="image" type="file"
                                                class="form-control form-control-lg no-autofill" name="image"
                                                value="{{ old('image') }}">
                                        </div>

                                    </div>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" id='registerBtn'>
                                            {{ __('Registrar evento') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
