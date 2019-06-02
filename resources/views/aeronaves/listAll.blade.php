@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Lista de aeronaves</h5>

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
                                    <th scope="col">Total horas</th>
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
                                @can("update",App\Aeronave::class)
                                    <td scope="row">
                                        <a href="{{route('aeronaves.edit', $aeronave->matricula)}}"><button type="submit" class="btn btn-success" name="ok">Editar</button></a>
                                        <form action="{{ route('aeronaves.destroy', $aeronave) }}" method="post" class="form-inline">      
                                            <input class="btn btn-block btn-danger " type="submit" value="Apagar" />
                                            <input type="hidden" name="_method" value="delete"/>
                                            {!! csrf_field() !!}
                                        </form>
                                    </td>
                                @endcan
                                </tr>
                            @endforeach

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection