@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!

                </div>

                <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de lugares</th>
                                    <th>Conta horas</th>
                                    <th>Preço hora</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($aeronaves as $aeronave)
                                <tr>
                                    <td>{{$aeronave->matricula}}</td>
                                    <td>{{$aeronave->marca}}</td>
                                    <td>{{$aeronave->modelo}}</td>
                                    <td>{{$aeronave->num_lugares}}</td>
                                    <td>{{$aeronave->conta_horas}}</td>
                                    <td>{{$aeronave->preco_hora}}</td>
                                </tr>
                            @endforeach

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection