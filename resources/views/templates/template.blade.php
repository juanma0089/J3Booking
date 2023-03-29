@extends('templates.general')

@section('nav')
    <nav class="navbar navbar-expand  bg-custom bg-body-tertiary border-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection


@section('footer')
    <nav class="navbar navbar-expand bg-custom bg-body-tertiary border-light border-top ">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house fa-xl bg-black" style="color: #ffffff;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
@endsection
