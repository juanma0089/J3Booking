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
                                <h3 class="fw-bold my-5 text-uppercase">Editar usuario</h3>

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

                                <form action="{{ route('updateuser', $user->id) }}" method="POST" id='edituser'>
                                    @csrf
                                    <div class="d-grid ">
                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg no-autofill" name="name"
                                                value="{{ $user->name ? $user->name : '' }}" required autofocus>
                                            <label class="form-label" for="name">Nombre</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="surname" type="text"
                                                class="form-control form-control-lg no-autofill" name="surname"
                                                value="{{ $user->surname ? $user->surname : '' }}" required>
                                            <label class="form-label" for="surname">Apellidos</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg no-autofill" name="email"
                                                value="{{ $user->email ? $user->email : '' }}" required
                                                autocomplete="email">
                                            <label class="form-label" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-3 col-md-4">
                                            <input id="phone" type="phone"
                                                class="form-control form-control-lg no-autofill" name="phone"
                                                value="{{ $user->phone ? $user->phone : '' }}" required>
                                            <label class="form-label" for="phone">Teléfono</label>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="jobtitle" id='jobtitle' required>
                                                <option value="" hidden {{ $user->jobtitle == '' ? 'selected' : '' }}>
                                                    Puesto</option>
                                                <option value="rrpp" {{ $user->jobtitle == 'rrpp' ? 'selected' : '' }}>
                                                    Relaciones públicas</option>
                                            </select>
                                        </div>

                                        <div class="form-outline text-white mb-4 col-3 col-md-4">
                                            <select
                                                class="form-select form-select-lg bg-custom rounded-1 text-white no-autofill white-border"
                                                name="role" id='role' required>
                                                <option value="" hidden {{ $user->role == '' ? 'selected' : '' }}>
                                                    Permisos</option>
                                                <option value="normal" {{ $user->role == 'normal' ? 'selected' : '' }}>
                                                    Normal</option>
                                                <option value="moderator"
                                                    {{ $user->role == 'moderator' ? 'selected' : '' }}>Moderador</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                    Admin</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class='container col-12 text-center'>
                                        <button class="btn btn-outline-light btn-lg px-5 mx-1 col-10 col-md-4 text-center"
                                            type="submit" id='editBtn'>
                                            {{ __('Editar usuario') }}</button>

                                        <button
                                            class="btn btn-outline-light btn-lg col-10 mx-1 my-3 my-md-0 col-md-4 text-center"
                                            type="button" id='passwordBtn'>
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
