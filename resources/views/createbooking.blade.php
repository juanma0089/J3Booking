@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/register.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-5 text-uppercase">Registrar nueva reserva</h3>

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <form method="POST" action="{{route('bookingForm.create')}}" id='booking'>
                                    @csrf
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autofocus>

                                            <label class="form-label" for="name">Nombre cliente<span
                                                    class="text-danger">*</span></label>
                                        </div>


                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="diners" type="number"
                                                class="form-control form-control-lg no-autofill @error('diners') is-invalid @enderror"
                                                name="diners" value="{{ old('diners') }}">
                                            @error('diners')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="diners">Nº de clientes</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="date" type="date"
                                                class="form-control form-control-lg no-autofill @error('date') is-invalid @enderror"
                                                name="date" value="{{ old('date') }}">
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="date">Fecha</label>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border @error('time') is-invalid @enderror"
                                                name="time" id='time' required>
                                                <option value="" hidden selected>Turno</option>
                                                <option value="afternoon">Tarde</option>
                                                <option value="night">Noche</option>
                                                @error('time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border @error('booking') is-invalid @enderror"
                                                name="booking" id='booking' required>
                                                <option value="" hidden selected>Tipo reserva</option>
                                                <option value="phone">Teléfono</option>
                                                <option value="instagram">Instagram</option>
                                                @error('booking')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>

                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" id='registerBtn'>
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
