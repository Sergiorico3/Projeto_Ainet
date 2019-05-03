@extends('layouts.app') @section('content')
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

                    <form method="GET" action="{{route('home',['id'=>$user->id])}}" >
                        @method('GET')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome Completo</th>
                                    <th>Email</th>
                                    <th>Tipo Sócio</th>
                                    <th>Nome Informal</th>
                                    <th>Sexo</th>
                                    <th>Foto</th>
                                    <th>NIF</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Quota paga</th>
                                    <th>Sócio ativo</th>
                                    <th>Direção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->tipo_socio}}</td>
                                    <td>{{$user->nome_informal}}</td>
                                    <td>{{$user->sexo}}</td>
                                    <td><img src="{{Storage::url('public/fotos/10000_5cc9725993c32.jpg')}}"></td>
                                    <td>{{$user->nif}}</td>
                                    <td>{{$user->telefone}}</td>
                                    <td>{{$user->endereco}}</td>
                                    <td>{{$user->quota_paga}}</td>
                                    <td>{{$user->ativo}}</td>
                                    <td>{{$user->direcao}}</td>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @endsection