@extends('templates.general')

@section('nav')
    <nav class="navbar sticky-top navbar-expand-lg bg-custom bg-body-tertiary border-light border-bottom">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list text-white fs-1"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <i class="bi bi-clock-history text-white fs-1"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <i class="bi bi-check-all text-white fs-1"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <i class="bi bi-brightness-high text-white fs-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="#">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#">Mesas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-danger dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection


@section('footer')
    <nav class="container-fluid position-fixed navbar sticky-bottom navbar-expand bg-custom bg-body-tertiary border-light border-top ">

        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{route('index')}}"><i class="fa-solid fa-house fa-xl bg-black"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-plus-lg fa-xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('users')}}"><i class="fa-solid fa-user fa-xl"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
