@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-14 col-md-14 col-lg-14 mx-auto">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Editar movimento</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"> Data do voo </th>
                                    <th scope="col"> Hora descolagem </th>
                                    <th scope="col"> Hora aterragem	</th>	
                                    <th scope="col"> Aeronave	</th>	
                                    <th scope="col"> N.º Diário	</th>	
                                    <th scope="col"> N.º Serviço	</th>	
                                    <th scope="col"> Piloto	</th>	
                                    <th scope="col"> Natureza do voo </th>
                                    <th scope="col"> Aeródromo de partida</th>	
                                    <th scope="col"> Aeródromo de chegada</th>
                                    <th scope="col"> N.º aterragens</th>
                                    <th scope="col"> N.º de descolagens </th>	
                                    <th scope="col"> N.º de pessoas a bordo</th>	
                                    <th scope="col"> Conta-horas incial</th>	
                                    <th scope="col"> Conta-horas final</th>	
                                    <th scope="col"> Tempo voo</th>	
                                    <th scope="col"> Preço voo</th>
                                    <th scope="col"> Modo de pagamento</th>	
                                    <th scope="col"> N.º de recibo </th>
                                    <th scope="col"> Observações</th>
                                    <!-- Caso seja relativo a um voo de instrução -->
                                    <th scope="col"> Tipo de instrução </th>
                                    <th scope="col"> Instrutor </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{$movimento->data}}</td>
                                    <td scope="row">{{$movimento->hora_descolagem}}</td>
                                    <td scope="row">{{$movimento->hora_aterragem}}</td>
                                    <td scope="row">{{$movimento->aeronave}}</td>
                                    <td scope="row">{{$movimento->num_diario}}</td>
                                    <td scope="row">{{$movimento->num_servico}}</td>
                                    <td scope="row">{{$movimento->piloto_id}}</td>
                                    <td scope="row">{{$movimento->naturezaVooToString()}}</td>
                                    <td scope="row">{{$movimento->aerodromo_partidoa}}</td>
                                    <td scope="row">{{$movimento->aerodromo_chegada}}</td>
                                    <td scope="row">{{$movimento->num_aterragens}}</td>
                                    <td scope="row">{{$movimento->num_descolagens}}</td>
                                    <td scope="row">{{$movimento->num_pessoas}}</td>
                                    <td scope="row">{{$movimento->conta_horas_inicio}}</td>
                                    <td scope="row">{{$movimento->conta_horas_fim}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->preco_voo}}</td>
                                    <td scope="row">{{$movimento->modo_pagamento}}</td>
                                    <td scope="row">{{$movimento->num_recibo}}</td>
                                    <td scope="row">{{$movimento->observacoes}}</td>
                                    <!-- Caso seja relativo a um voo de instrução -->
                                    <td scope="row">{{$movimento->tipo_instrucaoToString()}}</td>
                                    <td scope="row">{{$movimento->instrutor_id}}</td>
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
                        <h5 class="card-title text-center">Editar Movimento</h5>

                       
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection