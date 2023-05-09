@extends('templates.general')

@section('body')
    <section class="vh-100 ">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>

                                <img id="imgLogo" src="{{ asset('assets/img/logo.png') }}" class="pb-3 logo-login"
                                    alt="logo J3">

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <?php
                                        toastr($error, 'error', 'Ops, ¡Error!');
                                        ?>
                                    @endforeach
                                @endif

                                <h2 class="fw-bold my-5 text-uppercase">Iniciar sesión</h2>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg no-autofill" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label class="form-label" for="email">Email</label>
                                        </div>

                                        <div class="form-group d-flex">
                                            <div class="form-outline form-white mb-4 col-3 col-md-4">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg no-autofill" name="password"
                                                    required autocomplete="current-password">
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <i class="fas fa-eye mx-3 my-3"></i>
                                        </div>
                                    </div>

                                    {{-- ! Recuérdame tiene sentido? Si no funciona lo quitamos  --}}
                                    {{-- <div class="form-group row mb-3 text-start">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recuérdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- TODO Implementar recordar contraseña --}}
                                    {{-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot
                                            password?</a></p> --}}

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                        {{ __('Iniciar sesión') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Logo img login anim
        gsap.fromTo('#imgLogo', {
            opacity: 0,
            scale: 0
        }, {
            opacity: 1,
            scale: 1,
            duration: 2
        })
    </script>
@endsection
