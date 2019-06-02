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
                    
                    <form method="POST" type="hidden" action="{{ route('socios.update', $socio) }}" class="form-signin" enctype="multipart/form-data">
                        @method('PUT') @csrf

                        <div class="form-label-group">
                            <input id="foto_url" type="file" class="form-control{{ $errors->has('foto_url') ? ' is-invalid' : '' }}"
                                name="foto_url" accept="image/*" value="{{$socio->foto_url}}" optional="optional">
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

                        

                        <div class="form-label-group">
                            <input @cannot("updateAll", App\User::class) disabled @endcannot 
                                type="text"
                                class="form-control"
                                name="num_socio"
                                id="num_socio"
                                placeholder="num_socio"
                                pattern="^[0-9]+$"
                                title="N.º Sócio deve conter apenas numeros"
                                value="{{ old('num_socio', $socio->num_socio) }}">
                            <label for="num_socio">N.º Sócio</label>
                            @if ($errors->has('num_socio'))
                            <em>{{ $errors->first('num_socio') }}</em>
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

                        <div class="col-sm-12 col-md-4">
                            <label for="ativo">Ativo</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="ativo" id="A" value="1" {{ old('ativo', $socio->ativo) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="ativo" id="N" value="0" {{ old('ativo', $socio->ativo) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('ativo'))
                            <em>{{ $errors->first('ativo') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="quota_paga">Quota Paga</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="quota_paga" id="P" value="1" {{ old('ativo', $socio->quota_paga) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="quota_paga" id="N" value="0" {{ old('ativo', $socio->quota_paga) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('quota_paga'))
                            <em>{{ $errors->first('quota_paga') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="tipo_socio">Tipo sócio</label>
                            <select @cannot("updateAll", App\User::class) disabled @endcannot name="tipo_socio" id="tipo_socio" class="form-control">
                                <option disabled selected> -- Selecione o tipo de sócio -- </option>
                                <option value="P">Piloto</option>
                                <option value="NP">Não piloto</option>
                                <option value="A">Aeromodelista</option>
                            </select>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="direcao">Direção</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="direcao" id="D" value="1" {{ old('ativo', $socio->direcao) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="direcao" id="N" value="0" {{ old('ativo', $socio->direcao) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('direcao'))
                            <em>{{ $errors->first('direcao') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="instrutor">Instrutor</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="instrutor" id="I" value="1" {{ old('ativo', $socio->instrutor) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="instrutor" id="N" value="0" {{ old('ativo', $socio->instrutor) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('instrutor'))
                            <em>{{ $errors->first('instrutor') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="aluno">Aluno</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="aluno" id="I" value="1" {{ old('ativo', $socio->aluno) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="aluno" id="N" value="0" {{ old('ativo', $socio->aluno) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('aluno'))
                            <em>{{ $errors->first('aluno') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="certificado_confirmado">Certificado confirmado</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="certificado_confirmado" id="I" value="1" {{ old('ativo', $socio->certificado_confirmado) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="certificado_confirmado" id="N" value="0" {{ old('ativo', $socio->certificado_confirmado) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('certificado_confirmado'))
                            <em>{{ $errors->first('certificado_confirmado') }}</em>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="licenca_confirmada">Licença confirmado</label><br>
                            <label for="1">Sim</label>
                            <input @cannot("updateAll", App\User::class) disabled @endcannot type="radio" name="licenca_confirmada" id="I" value="1" {{ old('ativo', $socio->licenca_confirmada) =='1'? "checked":""}}><br>
                            <label for="0">Não</label>
                            <input @cannot("updateAll", App\User::class) disabled  @endcannot type="radio" name="licenca_confirmada" id="N" value="0" {{ old('ativo', $socio->licenca_confirmada) =='0'? "checked":""}}><br>
                            <br>
                            @if ($errors->has('licenca_confirmada'))
                            <em>{{ $errors->first('licenca_confirmada') }}</em>
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