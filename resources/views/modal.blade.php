<!-- Button trigger modal -->
@extends('templates.template')
@section('body')
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog">
            <form action="" method="get">
                <div class="modal-content bg-custom text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalToggleLabel">Gestionar mesa</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="mb-2 fs-3"  for="">Asignar reserva</label>
                        <select class="form-select form-select bg-custom text-white" aria-label=".form-select-sm example" size="1" >
                            <option selected value="null" class="text-success">MESA LIBRE</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="1">One - 2</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="1">One</option>
                          </select>
                        <label for="" class="mt-4 fs-3">Añadir botellas</i></label>
                        <div class="">
                            <label for="" class="mt-4 fs-5"><i class="mx-2 bi bi-star"></i>Botellas normal</label>
                            <div class="d-flex justify-content-evenly align-items-center my-2">
                                <i class="bi bi-dash-lg text-danger fs-3"></i>
                                <input class="form-control bg-transparent border-0 text-center w-25 text-light" type="num" value="0" readonly>
                                <i class="bi bi-plus-lg text-success fs-3"></i>
                            </div>
                        </div>
                        <div class="">
                            <label for="" class="mt-4 fs-5"><i class="mx-2 bi bi-star-half"></i>Botellas superior</label>
                            <div class="d-flex justify-content-evenly align-items-center my-2">
                                <i class="bi bi-dash-lg text-danger fs-3"></i>
                                <input class="form-control bg-transparent border-0 text-center w-25 text-light" type="num" value="0" readonly>
                                <i class="bi bi-plus-lg text-success fs-3"></i>
                            </div>
                        </div>
                        <div class="">
                            <label for="" class="mt-4 fs-5"><i class="mx-2 bi bi-star-fill"></i>Botellas premium</label>
                            <div class="d-flex justify-content-evenly align-items-center my-2">
                                <i class="bi bi-dash-lg text-danger fs-3"></i>
                                <input class="form-control bg-transparent border-0 text-center w-25 text-light" type="num" value="0" readonly>
                                <i class="bi bi-plus-lg text-success fs-3"></i>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-evenly">
                        <p class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">Volver</p>
                        <button type="submit" class="btn btn-outline-light text-success border-success">Asignar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>
@endsection
