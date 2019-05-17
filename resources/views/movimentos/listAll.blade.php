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

                <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Movimento</th>
                                    <th>Matrícula</th>
                                    <th>Data do voo</th>
                                    <th>Hora de descolagem</th>
                                    <th>Hora de aterragem</th>
                                    <th>Tempo de voo</th>
                                    <th>Natureza do voo</th>
                                    <th>Piloto</th>
                                    <th>Código do aeródromo de partida</th>
                                    <th>Código do aeródromo de chegada</th>
                                    <th>Nº de aterragens</th>
                                    <th>Nº de descolagens</th>
                                    <th>Nº diário</th>
                                    <th>Nº serviço</th>
                                    <th>Conta-horas inicial</th>
                                    <th>Conta-horas final</th>
                                    <th>Nº de pessoas a bordo</th>
                                    <th>Tipo de instrução</th>
                                    <th>Instrutor</th>
                                    <th>Confirmado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($movimentos as $movimento)
                                <tr>
                                    <td>{{$movimento->id}}</td>
                                    <td>{{$movimento->aeronave}}</td>
                                    <td>{{$movimento->data}}</td>
                                    <td>{{$movimento->hora_descolagem}}</td>
                                    <td>{{$movimento->hora_aterragem}}</td>
                                    <td>{{$movimento->tempo_voo}}</td>
                                    <td>{{$movimento->natureza}}</td>
                                    <td>{{$movimento->piloto_id}}</td>
                                    <td>{{$movimento->aerodromo_partida}}</td>
                                    <td>{{$movimento->aerodromo_chegada}}</td>
                                    <td>{{$movimento->num_aterragens}}</td>
                                    <td>{{$movimento->num_descolagens}}</td>
                                    <td>{{$movimento->num_diario}}</td>
                                    <td>{{$movimento->num_servico}}</td>
                                    <td>{{$movimento->conta_horas_inicio}}</td>
                                    <td>{{$movimento->conta_horas_fim}}</td>
                                    <td>{{$movimento->num_pessoas}}</td>
                                    <td>{{$movimento->tipo_instrucao}}</td>
                                    <td>{{$movimento->instrutor_id}}</td>
                                    <td>{{$movimento->confirmado}}</td>

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