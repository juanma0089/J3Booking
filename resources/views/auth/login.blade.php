@extends('templates.general')

@section('body')
    <section class="vh-100 ">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>

                                <img src="{{ asset('assets/img/logo.png') }}" class="pb-3 logo-login" alt="logo J3">

                                <h2 class="fw-bold my-5 text-uppercase">Iniciar sesión</h2>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg no-autofill @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="email">Email</label>
                                        </div>

                                        <div class="form-group d-flex">
                                            <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg no-autofill @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <i class="fas fa-eye mx-3 my-3"></i>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3 text-start">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recuérdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- TODO Implementar recordar contraseña --}}
                                    {{-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot
                                            password?</a></p> --}}

                                    {{-- TODO Se puede poner el botón como iniciar sesión? --}}
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                        {{ __('Login') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
