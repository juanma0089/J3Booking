@extends('templates.general')

@section('nav')
    <nav class="navbar sticky-top bg-custom bg-body-tertiary border-light border-bottom">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-white fs-1"></i>
            </button>
            <a href="{{ route('history') }}">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                    <i class="bi bi-clock-history text-white fs-1"></i>
                </button>
            </a>
            <a href="{{ route('books') }}">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                    <i class="bi bi-check-all text-white fs-1"></i>
                </button>
            </a>
            <a class="navbar-toggler" type="button" data-bs-toggle="collapse" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-in-right text-white fs-1"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('index') }}">Mesas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('booking') }}">Crear
                            reserva</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('books') }}">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="{{ route('history') }}">Historial</a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('users') }}">Usuarios</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection


@section('footer')
    <nav
        class="container-fluid position-fixed navbar sticky-bottom navbar-expand bg-custom bg-body-tertiary border-light border-top ">

        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('index') }}"><i
                                class="fa-solid fa-house fa-xl bg-black"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"href="{{ route('booking') }}"><i class="bi bi-plus-lg fa-xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('edituser', Auth::user()->id) }}"><i
                                class="fa-solid fa-user fa-xl"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
