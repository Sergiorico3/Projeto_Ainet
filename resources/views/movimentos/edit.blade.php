@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-14 col-md-14 col-lg-14 mx-auto">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Editar Movimento</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Movimento</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Data do voo</th>
                                    <th scope="col">Hora de descolagem</th>
                                    <th scope="col">Hora de aterragem</th>
                                    <th scope="col">Tempo de voo</th>
                                    <th scope="col">Natureza do voo</th>
                                    <th scope="col">Piloto</th>
                                    <th scope="col">Código do aeródromo de partida</th>
                                    <th scope="col">Código do aeródromo de chegada</th>
                                    <th scope="col">Nº de aterragens</th>
                                    <th scope="col">Nº de descolagens</th>
                                    <th scope="col">Nº diário</th>
                                    <th scope="col">Nº serviço</th>
                                    <th scope="col">Conta-horas inicial</th>
                                    <th scope="col">Conta-horas final</th>
                                    <th scope="col">Nº de pessoas a bordo</th>
                                    <th scope="col">Tipo de instrução</th>
                                    <th scope="col">Instrutor</th>
                                    <th scope="col">Confirmado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{$movimento->id}}</td>
                                    <td scope="row">{{$movimento->aeronave}}</td>
                                    <td scope="row">{{$movimento->data}}</td>
                                    <td scope="row">{{$movimento->hora_descolagem}}</td>
                                    <td scope="row">{{$movimento->hora_aterragem}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->naturezaVooToString()}}</td>
                                    <td scope="row">{{$movimento->piloto_id}}</td>
                                    <td scope="row">{{$movimento->aerodromo_partidoa}}</td>
                                    <td scope="row">{{$movimento->aerodromo_chegada}}</td>
                                    <td scope="row">{{$movimento->num_aterragens}}</td>
                                    <td scope="row">{{$movimento->num_descolagens}}</td>
                                    <td scope="row">{{$movimento->num_diario}}</td>
                                    <td scope="row">{{$movimento->num_servico}}</td>
                                    <td scope="row">{{$movimento->conta_horas_inicio}}</td>
                                    <td scope="row">{{$movimento->conta_horas_fim}}</td>
                                    <td scope="row">{{$movimento->num_pessoas}}</td>
                                    <td scope="row">{{$movimento->tipo_instrucaoToString()}}</td>
                                    <td scope="row">{{$movimento->instrutor_id}}</td>
                                    <td scope="row">{{$movimento-> confirmadoToString()}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Editar movimento</h5>

                        <form
                            class="form-signin"
                            action="{{ route('movimentos.update', $movimento ) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @method('put') @csrf

                            

                            <hr class="my-4">
                            <button
                                type="submit"
                                class="btn btn-lg btn-google btn-block text-uppercase"
                                name="ok">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection