@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sócio</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nº sócio</th>
                                    <th>Nome Informal</th>
                                    <th>Nome Completo</th>
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
                                    <td>{{$socio->nome_informal}}</td>
                                    <td>{{$socio->name}}</td>
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
        </div>

        <div class="col-md-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Editar sócio</h5>
                    
                    <form method="POST"  action="{{ route('socios.update', $socio) }}" class="form-signin" enctype="multipart/form-data">
                        @method('PUT') @csrf
                        <div class="form-label-group">
                            <input
                                id="foto_url"
                                type="file"
                                class="form-control{{ $errors->has('foto_url') ? ' is-invalid' : '' }}"
                                name="foto_url"
                                accept="image/*"
                                value="{{$socio->foto_url}}"
                                optional="optional">

                            <label for="foto_url">Foto</label>
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
                                id="name"
                                placeholder="Nome completo"
                                autofocus="autofocus"
                                pattern="/^[\pL\s]+$/u"
                                title="Nome completo deve conter apenas letras"
                                value="{{ old('name', $socio->name) }}">

                            <label for="name">Nome completo</label>
                            @if ($errors->has('name'))
                            <em>{{ $errors->first('name') }}</em>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input
                                type="text"
                                class="form-control"
                                name="nome_informal"
                                id="nome_informal"
                                placeholder="Nome informal"
                                pattern="/^[\pL\s]+$/u"
                                title="Nome informal deve conter apenas letras"
                                value="{{ old('nome_informal', $socio->nome_informal) }}">
                            <label for="nome_informal">Nome informal</label>
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
                                value="{{ old('data_nascimento', $socio->data_nascimento) }}">
                            <label for="data_nascimento">Data nascimento</label>
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
                                value="{{ old('email', $socio->email) }}"
                                required>
                            <label for="email">Email</label>
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
                            <label for="nif">NIF</label>
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
                                pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
                                title="Numero de telefone deve conter apenas numeros"
                                value="{{ old('telefone', $socio->telefone) }}">
                            <label for="telefone">Telefone</label>
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
                                value="{{ old('endereco', $socio->endereco) }}">
                            <label for="endereco">Endereco</label>
                            @if ($errors->has('endereco'))
                            <em>{{ $errors->first('endereco') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="sexo">Sexo</label><br>
                            <label for="Masculino">Masculino</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="sexo" id="M" value="M" {{ old('sexo', $socio->sexo) =='M'? "checked":""}}><br>
                            <label for="Feminino">Feminino</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="sexo" id="F" value="F" {{ old('sexo', $socio->sexo) =='F'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('sexo'))
                            <em>{{ $errors->first('sexo') }}</em>
                            @endif
                        </div>

                        <hr class="my-4">
                        <button type="submit" class="btn btn-lg btn-google btn-block text-uppercase" name="guardar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @endsection