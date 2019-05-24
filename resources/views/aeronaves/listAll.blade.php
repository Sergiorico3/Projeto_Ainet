@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mapa de aeronaves</div>
                
                <div class="table-responsive"> 
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Unidade</th>
                                    <th scope="col">Minutos</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                            @for($i=0 ; $i < 10; $i++)
                                <tr>
                                    <td scope="row"> Unidade <input name="unidades[]" value="{{old('unidades.' . $i, $i+1)}}"> </td>
                                    <td scope="row"> Minuto <input name="minutos[]" value="{{old('minutos.' . $i, round(($i+1)*6/5)*5)}}"> </td>
                                    <td scope="row"> Preço <input name="preco[]" value="{{old('preco.' . $i, $i) }}"> </td>
                                </tr>
                            @endfor
                            </table>
                </div>
            </div>
            <br>
            <br>
            <div class="card">          
                <div class="card-header">Lista de aeronaves</div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-5">
                        <br>
                        <a href="{{route('aeronaves.create')}}" class="btn btn-info btn-xs" role="button">Criar aeronave</a>
                    </div>
                </div>
                <br>

                <div class="table-responsive"> 
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Número de lugares</th>
                                    <th scope="col">Conta horas</th>
                                    <th scope="col">Preço hora</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($aeronaves as $aeronave)
                                <tr>
                                    <td scope="row">{{$aeronave->matricula}}</td>
                                    <td scope="row">{{$aeronave->marca}}</td>
                                    <td scope="row">{{$aeronave->modelo}}</td>
                                    <td scope="row">{{$aeronave->num_lugares}}</td>
                                    <td scope="row">{{$aeronave->conta_horas}}</td>
                                    <td scope="row">{{$aeronave->preco_hora}}</td>

                                    <td scope="row">
                                        <a href="{{route('aeronaves.edit', $aeronave->matricula)}}"><button type="submit" class="btn btn-success" name="ok">Editar</button></a>
                                        <a href="{{route('aeronaves.destroy', $aeronave->matricula)}}"><button type="submit" class="btn btn-danger" name="ok">Apagar</button></a>
                                    </td>
                                
                                </tr>
                            @endforeach

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection