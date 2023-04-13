@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/edituser.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-5 text-uppercase">Actualizar contraseña</h3>

                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <form action={{ route('user-password.update') }} method="POST" id='-'>
                                    @method('PUT')
                                    @csrf
                                    @if ($errors->updatePassword->any())
                                        <div class="alert alert-danger text-start">
                                            @foreach ($errors->updatePassword->all() as $error)
                                                <li class="p-1">{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{-- TODO: IMPLEMENTAR MENSAJE SUCCESS --}}
                                    @if (session('mensaje'))
                                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                                    @endif
                                    <div class="d-grid ">
                                        <div class="form-group d-flex">
                                            <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg no-autofill" name="current_password"
                                                    required autofocus autocomplete="current-password">
                                                <label class="form-label" for="password">Contraseña actual</label>
                                            </div>
                                            <i class="fas fa-eye mx-3 my-3"></i>
                                        </div>

                                        <div class="form-group d-flex">
                                            <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg no-autofill" name="password"
                                                    required>
                                                <label class="form-label" for="password">Nueva contraseña</label>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex">
                                            <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg no-autofill"
                                                    name="password_confirmation" required>
                                                <label class="form-label" for="password">Confirmar contraseña</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class='container col-12 text-center'>
                                        <button
                                            class="btn btn-outline-light btn-lg col-10 mx-1 my-3 my-md-0 col-md-4 text-center"
                                            type="submit" id='passwordBtn'>
                                            {{ __('Cambiar contraseña') }}</button>
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