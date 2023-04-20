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
                                <h3 class="fw-bold my-5 text-uppercase">Registrar nuevo usuario</h3>

                                @if (session('message'))
                                <?php
                                toastr('Usuario creado con éxito', 'success', '¡Listo!');
                                ?>
                                @endif

                                @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <?php
                                            toastr($error, 'error', 'Ops, ¡Error!');
                                            ?>
                                            @endforeach
                                @endif

                                {{-- <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div> --}}

                                <form method="POST" action="{{ route('user.create') }}" id='register'>
                                    @csrf
                                    {{-- TODO -> La contraseña está required y no hay campo inútí  --}}
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill" name="name"
                                                value="{{ old('name') }}" required autofocus>
                                            <label class="form-label" for="name">Nombre</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="surname" type="text"
                                                class="form-control form-control-lg no-autofill" name="surname"
                                                value="{{ old('surname') }}" required>
                                            <label class="form-label" for="surname">Apellidos</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg no-autofill" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            <label class="form-label" for="email">Email</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="phone" type="phone"
                                                class="form-control form-control-lg no-autofill" name="phone"
                                                value="{{ old('phone') }}" required>
                                            <label class="form-label" for="phone">Teléfono</label>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="jobtitle" id='jobtitle' required>
                                                <option value="" hidden selected>Puesto</option>
                                                <option value="rrpp">Relaciones públicas</option>
                                            </select>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="role" id='role' required>
                                                <option value="" hidden selected>Permisos</option>
                                                <option value="normal">Normal</option>
                                                <option value="moderator">Moderador</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>

                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" id='registerBtn'>
                                        {{ __('Registrar usuario') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
