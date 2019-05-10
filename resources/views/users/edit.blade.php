@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-14 col-md-14 col-lg-14 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Dashboard</h5>

                    <form method="GET" action="{{route('socios.edit',['id'=>$socio->id])}}">
                        @method('GET')
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
                                    <td><img src="{{route('getfile',['user'=>$socio->foto_url])}}"></td>
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
                                    <td>{{$socio->ativo}}</td>
                                    <td>{{$socio->direcao}}</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Edit socio</h5>

                            <form
                                class="form-signin"
                                action="{{ action('UserController@update', $socio->id) }}"
                                method="post">
                                @method('put') @csrf
                                <div class="form-label-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="inputName"
                                        placeholder="Nome completo"
                                        autofocus="autofocus"
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
                                        id="inputNameInformal"
                                        placeholder="Data nascimento"
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
                                        id="inputNameInformal"
                                        placeholder="Email"
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
                                        id="inputNameInformal"
                                        placeholder="Nif"
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
                                        id="inputNameInformal"
                                        placeholder="Telefone"
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
                                        id="inputNameInformal"
                                        placeholder="Endereco"
                                        value="{{ old('name', $socio->endereco) }}">
                                    <label for="inputName">Endereco</label>
                                    @if ($errors->has('endereco'))
                                    <em>{{ $errors->first('endereco') }}</em>
                                    @endif
                                </div>

                                <div class="form-label-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="endereco"
                                        id="inputNameInformal"
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
                                    class="btn btn-lg btn-primary btn-block text-uppercase"
                                    name="ok">Save</button>
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-google btn-block text-uppercase"
                                    name="cancel">Cancel</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    @endsection