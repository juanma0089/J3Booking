@extends('templates.template')

@section('javascript')
    {{ asset('assets/js/users.js') }}
@endsection

@section('body')
    <section class="vh-100 ">
        <div class="container overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-custom text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <div>
                                <h3 class="fw-bold my-5 text-uppercase">Editar usuario</h3>

                                <div class="alert alert-danger" role="alert" id='alertErrors' hidden></div>

                                <form action="{{ route('updateuser', $user->id) }}" method="POST" id='edituser'>
                                    @csrf
                                    {{-- TODO -> La contraseña está required y no hay campo inútí  --}}
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill @error('name') is-invalid @enderror"
                                                name="name" value="{{$user->name ? $user->name : ''}}" required autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="name">Nombre <span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="surname" type="text"
                                                class="form-control form-control-lg no-autofill @error('surname') is-invalid @enderror"
                                                name="surname" value="{{$user->surname ? $user->surname : ''}}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="surname">Apellidos</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg no-autofill @error('email') is-invalid @enderror"
                                                name="email" value="{{$user->email ? $user->email : ''}}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="phone" type="phone"
                                                class="form-control form-control-lg no-autofill @error('phone') is-invalid @enderror"
                                                name="phone" value="{{$user->phone ? $user->phone : ''}}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="phone">Teléfono</label>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border @error('jobtitle') is-invalid @enderror"
                                                name="jobtitle" id='jobtitle' required >
                                                <option value="" hidden {{ ($user->jobtitle == '') ? 'selected' : '' }}>Puesto</option>
                                                <option value="rrpp" {{ ($user->jobtitle == 'rrpp') ? 'selected' : '' }}>Relaciones públicas</option>

                                                @error('jobtitle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border @error('role') is-invalid @enderror"
                                                name="role" id='role' required>
                                                <option value="" hidden {{ ($user->role == '') ? 'selected' : '' }}>Permisos</option>
                                                <option value="normal" {{ ($user->role == 'normal') ? 'selected' : '' }}>Normal</option>
                                                <option value="moderator" {{ ($user->role == 'moderator') ? 'selected' : '' }}>Moderador</option>
                                                <option value="admin" {{ ($user->role == 'admin') ? 'selected' : '' }}>Admin</option>

                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>

                                    </div>

                                    {{-- TODO Se puede poner el botón como iniciar sesión? --}}
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" id='editBtn'>
                                        {{ __('Editar usuario') }}</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
