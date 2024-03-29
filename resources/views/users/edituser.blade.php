@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/edituser.js') }}
@endsection

@section('body')
    <section id="mainPanel" class="container overflow-y-auto overflow-x-hidden position-relative py-4">

        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-3 mt-2 text-uppercase">Editar usuario</h3>

                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <?php
                                        toastr($error, 'error', 'Ops, ¡Error!');
                                        ?>
                                    @endforeach
                                @endif

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <form action="{{ route('updateuser', $user->id) }}" method="POST" id='edituser'>
                                    @csrf
                                    <div class="d-grid ">

                                        <div class="accordion accordion-flush" id="accordionFlushExample">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed text-white" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne"
                                                        data-target="name">
                                                        Nombre de usuario
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                            <input id="name" type="text"
                                                                class="form-control form-control-lg no-autofill"
                                                                autocomplete="off" name="name"
                                                                value="{{ $user->name ? $user->name : '' }}" required
                                                                autofocus>
                                                            <label class="form-label" for="name">Nombre</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed text-white" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo"
                                                        data-target="surname">
                                                        Apellidos
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                            <input id="surname" type="text"
                                                                class="form-control form-control-lg no-autofill"
                                                                name="surname" autocomplete="off"
                                                                value="{{ $user->surname ? $user->surname : '' }}" required>
                                                            <label class="form-label" for="surname">Apellidos</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed text-white" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree"
                                                        data-target="email">
                                                        Dirección email
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                            <input id="email" type="email"
                                                                class="form-control form-control-lg no-autofill"
                                                                name="email"
                                                                value="{{ $user->email ? $user->email : '' }}" required
                                                                autocomplete="email">
                                                            <label class="form-label" for="email">Email <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed text-white" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                                        aria-expanded="false" aria-controls="flush-collapseFour"
                                                        data-target="phone">
                                                        Teléfono móvil
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                            <input id="phone" type="phone"
                                                                class="form-control form-control-lg no-autofill"
                                                                name="phone"
                                                                autocomplete="off"
                                                                value="{{ $user->phone ? $user->phone : '' }}" required>
                                                            <label class="form-label" for="phone">Teléfono</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role == 'admin')
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed text-white"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFive" aria-expanded="false"
                                                            aria-controls="flush-collapseFive">
                                                            Puesto y permisos
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="form-outline text-white mb-4 col-3 col-md-4">
                                                                <select
                                                                    class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                                    name="role" id='role' required>
                                                                    <option value="" hidden
                                                                        {{ $user->role == '' ? 'selected' : '' }}>
                                                                        Permisos</option>
                                                                    <option @if (Auth::user()->role == 'admin' && Auth::user()->id == $user->id ) disabled @endif value="normal"
                                                                        {{ $user->role == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                    <option @if (Auth::user()->role == 'admin' && Auth::user()->id == $user->id ) disabled @endif value="moderator"
                                                                        {{ $user->role == 'moderator' ? 'selected' : '' }}>
                                                                        Moderador
                                                                    </option>
                                                                    <option value="admin"
                                                                        {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                                        Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class='container col-12 text-center mt-5'>
                                        <button class="btn btn-outline-light btn-lg px-5 mx-1 col-12 col-md-4 text-center"
                                            type="submit" id='editBtn'>
                                            {{ __('Guardar cambios') }}</button>
                                        @if ($user->id === Auth::user()->id)
                                            <a href="{{ route('cambiarPassword') }}"><button
                                                    class="btn btn-outline-light btn-lg col-12 mx-1 my-3 my-md-0 col-md-4 text-center"
                                                    type="button" id='passwordBtn'>
                                                    {{ __('Cambiar contraseña') }}</button></a>
                                        @endif
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
