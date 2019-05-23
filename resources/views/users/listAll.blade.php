@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de sócios</div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-5">
                        <br>
                        <a href="{{route('socios.create')}}" class="btn btn-info btn-xs" role="button">Criar sócio</a>
                    </div>
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
                        <br>
                        <div class="col-sm-12 col-md-4">
                            <label for="tipo_socio">Tipo sócio</label><br>
                            <label for="Piloto">Piloto</label>
                            <input type="radio" name="tipo_socio" id="tipo_socio" value="P"><br>
                            <label for="Piloto">Não-Piloto</label>
                            <input type="radio" name="tipo_socio" id="tipo_socio" value="NP"><br>
                            <label for="Aeromodelista">Aeromodelista</label>
                            <input type="radio" name="tipo_socio" id="tipo_socio" value="A"><br>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="direcao">Direção</label><br>
                            <label for="Sim">Sim</label>
                            <input type="radio" name="direcao" id="direcao" value="1"><br>
                            <label for="Não">Não</label>
                            <input type="radio" name="direcao" id="direcao" value="0"><br>
                            <br>
                        </div>


                        Direção:<br>
                        <input id="direcao" type="text" class="form-control{{ $errors->has('direcao') ? ' is-invalid' : '' }}" name="direcao" value="{{ old('direcao') }}" >
                        Quotas pagas:<br>
                        <input id="quotas_pagas" type="text" class="form-control{{ $errors->has('quotas_pagas') ? ' is-invalid' : '' }}" name="quotas_pagas" value="{{ old('quotas_pagas') }}" >
                        Ativo:<br>
                        <input id="ativo" type="text" class="form-control{{ $errors->has('ativo') ? ' is-invalid' : '' }}" name="ativo" value="{{ old('ativo') }}" >
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
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nº de sócio</th>
                                    <th scope="col">Nome Informal</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Tipo sócio</th>
                                    <th scope="col">Nº licença</th>
                                    <th scope="col">Direção</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pesquisa as $socio)
                                <tr>
                                    <td scope="row"><img src="{{Storage::disk('public')->url('fotos/').$socio->foto_url}}"></td>
                                    <td scope="row">{{$socio->num_socio}}</td>
                                    <td scope="row">{{$socio->nome_informal}}</td>
                                    <td scope="row">{{$socio->email}}</td>
                                    <td scope="row">{{$socio->telefone}}</td>
                                    <td scope="row">{{$socio->typeSocioToString()}}</td>
                                    <td scope="row">{{$socio->num_licenca}}</td>
                                    <td scope="row">{{$socio->direcaoToString()}}</td>

                                    <td scope="row">
                                        <a href="{{route('socios.edit', $socio->id)}}"><button type="submit" class="btn btn-success" name="ok">Editar</button></a>
                                        <a href="{{route('socios.delete', $socio->id)}}"><button type="submit" class="btn btn-danger" name="ok">Apagar</button></a>
                                    </td>
                                </tr>
                            @endforeach

                            </table>
</div>
                            {{$pesquisa->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection