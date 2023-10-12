@extends('templates.template')
@section('javascript')
    {{ asset('assets/js/editbooking.js') }}
@endsection
@section('body')
    @if($book->user_id == Auth::user()->id || Auth::user()->role != 'normal')
    <section id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-3 mt-2 text-uppercase">Editando reserva</h3>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <?php
                                        toastr($error, 'error', 'Ops, ¡Error!');

                                        ?>
                                    @endforeach
                                @endif

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <div class="col-12 d-flex flex-row mb-4 justify-content-center gap-1 gap-md-0">
                                    @if ($book->type == 'pista')
                                        <p class="btn btn-outline-light bg-success col-6 col-md-4">
                                            {{ __('Reserva pista') }}</p>
                                    @else
                                        <p class="btn btn-outline-light bg-success col-6 col-md-4">
                                            {{ __('Reserva VIP') }}</p>
                                    @endif
                                </div>

                                <form method="POST" action="{{ route('bookingForm.edit') }}" id='editbooking'>
                                    @csrf
                                    @method('PUT')
                                    <input id="id" type="number" class="d-none" name="id"
                                        value={{ $book->id }} required hidden readonly>
                                    <input id="user_id" type="number" class="d-none" name="user_id"
                                        value={{ $book->user_id }} required hidden readonly>
                                    <input id="event_id" type="number" class="d-none" name="event_id"
                                        value={{ $book->event_id }} required hidden readonly>

                                    <input id="type" type="text" class="d-none" name="type"
                                        value="{{ $book->type }}" required hidden readonly>

                                    @if ($type = 'vip')
                                        <input id="table_id" type="number" class="d-none" name="table_id"
                                            value="{{ $book->table_id }}" required hidden readonly>
                                    @endif

                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill " name="name"
                                                value="{{ $book->name }}" required autofocus>
                                            <label class="form-label" for="name">Nombre</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="surname" type="text"
                                                class="form-control form-control-lg no-autofill " name="surname"
                                                value="{{ $book->surname }}" required autofocus>
                                            <label class="form-label" for="surname">Apellidos</label>
                                        </div>


                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="diners" type="number"
                                                class="form-control form-control-lg no-autofill" name="diners"
                                                value="{{ $book->diners }}" required>
                                            <label class="form-label" for="diners">Nº de personas</label>
                                        </div>
                                        @foreach ($book->bottles as $bottle)
                                            <section class="d-flex flex-column mb-2">
                                                <a href="{{ route('deletebottle', ['book' => $book->id, 'bottle' => $bottle->id]) }}"
                                                    class="col-auto bi bi-x-circle p-0 align-self-start mb-1 bg-transparent border-0 text-danger text-start">
                                                    Eliminar</a>
                                                <div class="text-white mb-4">
                                                    <select
                                                        class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border text-capitalize"
                                                        required>
                                                        <option value="{{ $bottle->type }}">{{ $bottle->type }}</option>
                                                    </select>
                                                    <select
                                                        class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                        required>
                                                        <option value="{{ $bottle->id }}">{{ $bottle->name }} -
                                                            {{ $bottle->price }} €</option>
                                                    </select>
                                                </div>
                                            </section>
                                        @endforeach

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


                                        <div id='containerBottles'>

                                        </div>

                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit" id='registerBtn'>
                                        {{ __('Editar reserva') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    @php
        toastr('No tienes permiso para acceder a esa reserva','error');
    @endphp
    <section id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4 text-center">
    <a type="button" class="mt-5 border border-3 px-3 py-2 rounded fs-4 bi bi-arrow-left text-white border-warning bg-transparent" href = '{{ route('index') }}''>
        Volver
    </a>
    </section>

    @endif
@endsection
