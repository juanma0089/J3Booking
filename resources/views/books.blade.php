@extends('templates.template')

@section('body')
    <div id="mainPanel" class="container min-vh-100 mt-4">


        <h1 class="text-center">Reservas</h1>
        {{-- <p>Hay {{ $prueba }} mesas disponibles para reservar.</p> --}}


        <div class="container-fluid ">
            <form method="" action="" class="row d-flex justify-content-center align-items-center p-3">


                    <div class="col-10">
                        <input class="form-control form-control-md" type="date" name="datepicker" id="datepicker" value="2023-04-04">
                    </div>
                    <div class="col-2 p-0">
                        <button class="form-control form-control-md p-0 bi bi-search fs-2 bg-transparent border-0" type="submit">
                    </div>
            </form>

        </div>


        <div class="row d-flex justify-content-center align-content-center" >
            <table class="col-12 table table-sm">
                    <thead>
                      <tr class="text-center">
                        <th class="col-2" scope="col"></th>
                        <th class="col-2" scope="col">Reserva</th>
                        <th class="col-2" scope="col">Personas</th>
                        <th class="col-2" scope="col">Botella</th>
                        <th class="col-2" scope="col">Rrpp</th>
                        <th class="col-2" scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider text-light">
                      <tr class="">
                        <th class="text-center col-2" scope="row"><i class="bi bi-x-lg text-danger"></i></th>
                        <td class="col-2 text-wrap">maraaaaaaaaak</td>
                        <td class="text-center col-2">4</td>
                        <td class="text-center col-2">NO</td>
                        <td class="col-2">@mdo</td>
                        <td class="col-2"><i class="bi bi-clipboard-check fs-2 text-success"></i></td>
                      </tr>

                    </tbody>
            </table>
        </div>

    </div>
@endsection
