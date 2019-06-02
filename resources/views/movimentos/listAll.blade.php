@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Filtrar movimentos</h5>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <br>
                            <a href="{{route('movimentos.create')}}" class="btn btn-info btn-xs" role="button">Criar movimento</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="GET" action="{{route('movimentos.index')}}">

                            <div class="col-sm-12 col-md-12">
                                <legend>Filtrar movimentos:</legend>
                                <label for="aeronave">ID Movimento:</label>
                                <input id="id" type="text" class="form-control" name="id" value="{{ old('id') }}" autofocus>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <label for="aeronave">Matricula aeronave:</label>
                                <select class="form-control" name="aeronave">
                                    <option value=''></option>
                                    @foreach($aeronaves as $aeronave)
                                    <option value="{{$aeronave->matricula}}">{{$aeronave->matricula}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <label for="instrutor_id">Instrutor:</label>
                                <select class="form-control" name="instrutor_id">
                                    <option value=''></option>
                                    @foreach($instrutores as $instrutor)
                                    <option value="{{$instrutor->id}}">{{$instrutor->id. '-' .$instrutor->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <label for="piloto_id">Piloto:</label>
                                <select class="form-control" name="piloto">
                                    <option value=''></option>
                                    @foreach($pilotos as $piloto)
                                    <option value="{{$piloto->id}}">{{$piloto->id. '-' .$piloto->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-4">
                            <label for="natureza">Natureza do voo:</label>
                                <select class="form-control" name="natureza" id="natureza" class="form-control">
                                    <option disabled selected>-- Natureza do voo --</option>
                                    <option value="T">Treino</option>
                                    <option value="I">Instrução</option>
                                    <option value="E">Especial</option>
                                </select>
                                <br>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                Data do voo:
                                <input class="form-control" type="date" name="data">
                                <br>
                            </div>

                            <div class="col-sm-12 col-md-4">
                            <label for="confirmado">Confirmado:</label>
                                <select name="confirmado" id="confirmado" class="form-control">
                                    <option disabled selected>Confirmado ?</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                <br>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Aplicar filtro') }}
                                    </button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Lista de movimentos</h5>
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
                                    @foreach($movimentos as $movimento)
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
                                        <td scope="row">{{$movimento->confirmadoToString()}}</td>

                                        <td scope="row">
                                            <a href="{{route('movimentos.edit', $movimento->id)}}"><button type="submit" class="btn btn-success" name="ok">Editar</button></a>
                                            <a href="{{route('movimentos.destroy', $movimento->id)}}"><button type="submit" class="btn btn-danger" name="ok">Apagar</button></a>
                                        </td>
                                    </tr>
                                    @endforeach

                            </table>
                            {{$movimentos->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection