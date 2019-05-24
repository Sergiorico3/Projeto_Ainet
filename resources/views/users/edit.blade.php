@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-14 col-md-14 col-lg-14 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sócio</h5>

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Id</th>
                                    <th>Nome Completo</th>
                                    <th>Nome Informal</th>
                                    <th>Email</th>
                                    <th>Tipo Sócio</th>
                                    <th>Sexo</th>
                                    <th>Ano nascimento</th>
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
                                    <td><img src="{{Storage::disk('public')->url('fotos/').$socio->foto_url}}"></td>
                                    <td>{{$socio->id}}</td>
                                    <td>{{$socio->name}}</td>
                                    <td>{{$socio->nome_informal}}</td>
                                    <td>{{$socio->email}}</td>
                                    <td>{{$socio->tipo_socio}}</td>
                                    <td>{{$socio->sexo}}</td>
                                    <td>{{$socio->data_nascimento}}</td>
                                    <td>{{$socio->nif}}</td>
                                    <td>{{$socio->telefone}}</td>
                                    <td>{{$socio->endereco}}</td>
                                    <td>{{$socio->quota_paga}}</td>
                                    <td>{{$socio->ativo }}</td>
                                    <td>{{$socio->direcao}}</td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Editar sócio</h5>

                        <form class="form-signin" action="{{ route('socios.update', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data" >

                            @method('put') 
                            @csrf

                            <div class="form-label-group">
                                    <input
                                        id="foto_url"
                                        type="file"
                                        class="form-control{{ $errors->has('foto_url') ? ' is-invalid' : '' }}"
                                        name="foto_url"
                                        accept="image/*"
                                        value="{{ Auth::user()->foto_url }}"
                                        optional="optional">
                                        
                                <label for="inputName">Foto</label>
                                    @if ($errors->has('foto_url'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto_url') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="inputName"
                                    placeholder="Nome completo"
                                    autofocus="autofocus"
                                    pattern="^[a-zA-ZÀ-ú\s]+$"
                                    title="Nome completo deve conter apenas letras"
                                    value="{{ old('name', $socio->name) }}">

                                <label for="inputName">Nome completo</label>
                                @if ($errors->has('name'))
                                <em>{{ $errors->first('name') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nome_informal"
                                    id="inputNameInformal"
                                    placeholder="Nome informal"
                                    pattern="^[a-zA-ZÀ-ú\s]+$"
                                    title="Nome informal deve conter apenas letras"
                                    value="{{ old('name', $socio->nome_informal) }}">
                                <label for="inputName">Nome informal</label>
                                @if ($errors->has('nome_informal'))
                                <em>{{ $errors->first('nome_informal') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="data_nascimento"
                                    id="data_nascimento"
                                    placeholder="Data nascimento"
                                    pattern="^\d{1,2}\-\d{1,2}\-\d{4}$"
                                    title="Data nascimento deve estar formatada corretamente"
                                    value="{{ old('name', $socio->data_nascimento) }}">
                                <label for="inputName">Data nascimento</label>
                                @if ($errors->has('data_nascimento'))
                                <em>{{ $errors->first('data_nascimento') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    placeholder="Email"
                                    pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
                                    title="Email deve estar formatado corretamente"
                                    value="{{ old('name', $socio->email) }}">
                                <label for="inputName">Email</label>
                                @if ($errors->has('email'))
                                <em>{{ $errors->first('email') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nif"
                                    id="nif"
                                    placeholder="Nif"
                            pattern="^[0-9]+$"
                            title="NIF deve conter apenas numeros"
                                    value="{{ old('nif', $socio->nif) }}">
                                <label for="inputName">Nif</label>
                                @if ($errors->has('nif'))
                                <em>{{ $errors->first('nif') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="telefone"
                                    id="telefone"
                                    placeholder="Telefone"
                                    pattern="^[0-9]+$"
                            title="Numero de telefone deve conter apenas numeros"
                                    value="{{ old('name', $socio->telefone) }}">
                                <label for="inputName">Telefone</label>
                                @if ($errors->has('telefone'))
                                <em>{{ $errors->first('telefone') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="endereco"
                                    id="endereco"
                                    placeholder="Endereco"
                                    value="{{ old('name', $socio->endereco) }}">
                                <label for="inputName">Endereco</label>
                                @if ($errors->has('endereco'))
                                <em>{{ $errors->first('endereco') }}</em>
                                @endif
                            </div> 

                            <hr class="my-4">
                            <button
                                type="submit"
                                class="btn btn-lg btn-google btn-block text-uppercase"
                                name="ok">Save</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection