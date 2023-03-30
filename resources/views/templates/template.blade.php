@extends('templates.general')

@section('nav')
    <nav class="navbar navbar-expand-lg bg-custom bg-body-tertiary border-light border-bottom sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler border-light border" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
    <nav class="navbar navbar-expand bg-custom bg-body-tertiary border-light border-top sticky-bottom">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i
                                class="fa-solid fa-house fa-xl bg-black" style="color: #ffffff;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-plus fa-xl"
                                style="color: #ffffff;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user fa-xl"
                                style="color: #ffffff;"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
@endsection
