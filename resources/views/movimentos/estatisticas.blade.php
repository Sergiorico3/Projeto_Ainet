@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h3 class="card-title text-center">Estatísticas</h3>

                    <div class="table-responsive">
                    <h6 class="card-title text-center">Aeronave mês</h6>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Janeiro
                                    </th>
                                    <th scope="col">
                                        Fevereiro
                                    </th>
                                    <th scope="col">
                                        Março
                                    </th>
                                    <th scope="col">
                                        Abril
                                    </th>
                                    <th scope="col">
                                        Maio
                                    </th>
                                    <th scope="col">
                                        Junho
                                    </th>
                                    <th scope="col">
                                        Julho
                                    </th>
                                    <th scope="col">
                                        Agosto
                                    </th>
                                    <th scope="col">
                                        Setembro
                                    </th>
                                    <th scope="col">
                                        Outubro
                                    </th>
                                    <th scope="col">
                                        Novembro
                                    </th>
                                    <th scope="col">
                                        Dezembro
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($aeronaves as $aeronave)
                                <tr>
                                    <td scope="row">{{aeronave->$movimentos_jan}}</td>
                                    <td scope="row">{{$movimentos_fev}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                    <h6 class="card-title text-center">Aeronave ano</h6>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Total horas / ano
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($movimentos as $movimento)
                                <tr>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        @endsection