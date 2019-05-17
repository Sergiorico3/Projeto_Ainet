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
                                </tr>
                            @endforeach

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection