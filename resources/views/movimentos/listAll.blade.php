@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de movimentos</div>

                                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-5">
                        <br>
                        <a href="{{route('movimentos.create')}}" class="btn btn-info btn-xs" role="button">Criar movimento</a>
                    </div>
                </div>
                
                <div class="card-body">

                    <form method="GET" action="{{route('movimentos.index')}}">
                       
                        <legend>Filtrar movimentos:</legend>
                        ID movimento:<br>
                        <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}"  autofocus>
                        Matricula aeronave:<br>
                        <input id="aeronave" type="text" class="form-control{{ $errors->has('aeronave') ? ' is-invalid' : '' }}" name="aeronave" value="{{ old('aeronave') }}"  autofocus>
                        ID piloto:<br>
                        <input id="piloto_id" type="text" class="form-control{{ $errors->has('piloto_id') ? ' is-invalid' : '' }}" name="piloto_id" value="{{ old('piloto_id') }}"  autofocus>
                        ID instrutor:<br>
                        <input id="instrutor_id" type="text" class="form-control{{ $errors->has('instrutor_id') ? ' is-invalid' : '' }}" name="instrutor_id" value="{{ old('instrutor_id') }}"  autofocus>
                        Data do voo:<br>
                        <input id="data" type="text" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{ old('data') }}" >
                        Natureza voo:<br>
                        <input id="natureza" type="text" class="form-control{{ $errors->has('natureza') ? ' is-invalid' : '' }}" name="natureza" value="{{ old('natureza') }}" >
                        Confirmado:<br>
                        <input id="confirmado" type="text" class="form-control{{ $errors->has('confirmado') ? ' is-invalid' : '' }}" name="confirmado" value="{{ old('confirmado') }}" >

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
                                    <td scope="row">{{$movimento-> confirmadoToString()}}</td>

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
    @endsection