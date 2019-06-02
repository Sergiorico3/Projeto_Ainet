@extends('layouts.app')
@section('content')
<div class="col-md-auto">
    <div class="card card-signin my-5">
        <div class="card-body">
            <h5 class="card-title text-center">Sócio autenticado</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nº de sócio</th>
                            <th scope="col">Nome Informal</th>
                            <th scope="col">Nome completo</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Data nascimento</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">NIF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Quotas em dia</th>
                            <th scope="col">Sócio ativo</th>
                            <th scope="col">Tipo sócio</th>
                            <th scope="col">Nº licença</th>
                            <th scope="col">Direção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                    <img src="{{Storage::disk('public')->url('fotos/').$socio->foto_url}}">
                                    <td scope="row">{{$socio->num_socio}}</td>
                                    <td scope="row">{{$socio->nome_informal}}</td>
                                    <td scope="row">{{$socio->name}}</td>
                                    <td scope="row">{{$socio->sexoToString()}}</td>
                                    <td scope="row">{{$socio->data_nascimento}}</td>
                                    <td scope="row">{{$socio->email}}</td>
                                    <td scope="row">{{$socio->nif}}</td>
                                    <td scope="row">{{$socio->telefone}}</td>
                                    <td scope="row">{{$socio->endereco}}</td>
                                    <td scope="row">{{$socio->quotasPagasToString()}}</td>
                                    <td scope="row">{{$socio->ativoToString()}}</td>
                                    <td scope="row">{{$socio->typeSocioToString()}}</td>
                                    <td scope="row">{{$socio->num_licenca}}</td>
                                    <td scope="row">{{$socio->direcaoToString()}}</td>
                        </tr>
                                </tbody>
                                </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

                </div>

            </div>
        </div>
    </div>
    @endsection