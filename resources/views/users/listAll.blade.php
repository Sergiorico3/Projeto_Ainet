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

                    <form method="GET" action="{{route('socios.index')}}">
                       
                        <legend>Filtrar sócios:</legend>
                        Número sócio:<br>
                        <input id="num_socio" type="text" class="form-control{{ $errors->has('num_socio') ? ' is-invalid' : '' }}" name="num_socio" value="{{ old('num_socio') }}"  autofocus>
                        Nome informal:<br>
                        <input id="nome_informal" type="text" class="form-control{{ $errors->has('nome_informal') ? ' is-invalid' : '' }}" name="nome_informal" value="{{ old('nome_informal') }}"  autofocus>
                        E-mail:<br>
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>
                        Tipo sócio:<br>
                        <input id="tipo_socio" type="text" class="form-control{{ $errors->has('tipo_socio') ? ' is-invalid' : '' }}" name="tipo_socio" value="{{ old('tipo_socio') }}"  autofocus>
                        Direção:<br>
                        <input id="direcao" type="text" class="form-control{{ $errors->has('direcao') ? ' is-invalid' : '' }}" name="direcao" value="{{ old('direcao') }}" >
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
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Número de sócio</th>
                                    <th>Nome Informal</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Tipo sócio</th>
                                    <th>Nº licença</th>
                                    <th>Direção</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pesquisa as $user)
                                <tr>
                                    <td><img src="{{Storage::disk('public')->url('fotos/').$user->foto_url}}"></td>
                                    <td>{{$user->num_socio}}</td>
                                    <td>{{$user->nome_informal}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telefone}}</td>
                                    <td>{{$user->tipo_socio}}</td>
                                    <td>{{$user->num_licenca}}</td>
                                    <td>{{$user->direcao}}</td>
                                </tr>
                            @endforeach

                            </table>
                            {{$pesquisa->appends(request()->except('page'))->links() }}
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection