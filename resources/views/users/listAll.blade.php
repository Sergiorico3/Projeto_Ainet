@extends('layouts.app')
@section('content') 
<div class="col-md-auto">
    <div class="card card-signin my-14">
        <div class="card-body">
            <h5 class="card-title text-center">Filtrar sócios</h5>

            <div class="col-md-auto">
            @can('updateAll', 'App\User')
                <div class="col-md-6 offset-md-5">
                    <br>
                    <a href="{{route('socios.create')}}" class="btn btn-lg btn-google" role="button">Criar sócio</a>
                </div>

                    <form method="POST" class="form-ad" action="{{route('socios.desativar')}}">
                        {!!csrf_field()!!}
                        @method('patch')
                        <button type="submit" class="btn btn-dark" name="ativo">Desativar sócios com quotas por pagar</button>
                    </form><br>
                    <form method="POST" class="form-ad" action="{{route('socios.reset_quotas')}}">
                        @method('patch') @csrf
                        <button type="submit" class="btn btn-dark" name="quotas">Declara as quotas de todos os sócios como "por pagar"</button>
                    </form>
            
                    <br>

                        <form method="POST" class="form-ad" action="{{route('socios.reset_quotas')}}">
                            @method('patch') @csrf
                            <button type="submit" class="btn btn-dark" name="ok">Declara as quotas de todos os sócios como "por pagar"</button>
                        </form>

                </div>
                @endcan
                    <br>
                        <form class="col-md-auto" method="GET" action="{{route('socios.index')}}">

                            <legend>Filtrar sócios:</legend>
                            Número sócio:<br>
                                <input
                                    id="num_socio"
                                    type="text"
                                    class="form-control{{ $errors->has('num_socio') ? ' is-invalid' : '' }}"
                                    name="num_socio"
                                    value="{{ old('num_socio') }}"
                                    autofocus="autofocus">
                            Nome informal:<br>
                                <input
                                    id="nome_informal"
                                    type="text"
                                    class="form-control{{ $errors->has('nome_informal') ? ' is-invalid' : '' }}"
                                    name="nome_informal"
                                    value="{{ old('nome_informal') }}"
                                    autofocus="autofocus">
                            E-mail:<br>
                                <input
                                    id="email"
                                    type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autofocus="autofocus">
                                    <br>
                            <div class="col-sm-12 col-md-4">
                                <select name="tipo_socio" id="tipo_socio" class="form-control">
                                    <option disabled="disabled" selected="selected">Tipo sócio</option>
                                    <option value="P">Piloto</option>
                                    <option value="NP">Não piloto</option>
                                    <option value="A">Aeromodelista</option><br>
                                </select>
                            </div>                                

                            <div class="col-sm-12 col-md-4">
                                <select name="direcao" id="direcao" class="form-control">
                                    <option disabled="disabled" selected="selected">Sócio da direção ?</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div><br>

                            <div class="col-sm-12 col-md-4">
                                <select name="quotas_pagas" id="quotas_pagas" class="form-control">
                                    <option disabled="disabled" selected="selected">Quotas pagas ?</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div><br>

                            <div class="col-sm-12 col-md-4">
                                <select name="ativo" id="ativo" class="form-control">
                                    <option disabled="disabled" selected="selected">Sócio ativo ?</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div><br>

                            <div class="col-md-auto ">
                                <div class="col-md-6 offset-md-5">
                                    <br>
                                    <button type="submit" class="btn btn-lg btn-facebook ">
                                        {{ __('Aplicar filtro') }}
                                    </button>
                                </div>
                            </div>
                       </form> <br>
                        
                @can('viewUser', 'App\User', 'Auth::user()')
                        <div class="col-md-auto">
                            <div class="card card-signin my-5">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Lista de sócios</h5>
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
                                                    <td scope="row">
                                                        
                                                            <img src="{{Storage::disk('public')->url('fotos/').$socio->foto_url}}">
                                                            <td scope="row">{{$socio->num_socio}}</td>
                                                            <td scope="row">{{$socio->nome_informal}}</td>
                                                            <td scope="row">{{$socio->email}}</td>
                                                            <td scope="row">{{$socio->telefone}}</td>
                                                            <td scope="row">{{$socio->typeSocioToString()}}</td>
                                                            <td scope="row">{{$socio->num_licenca}}</td>
                                                            <td scope="row">{{$socio->direcaoToString()}}</td>
                                                            <td scope="row">
                                                           
                                                                <a href="{{route('socios.edit', $socio->id)}}">
                                                                    <button
                                                                        type="submit"
                                                                        class="btn btn-block btn-success text-uppercase"
                                                                        name="ok">Editar
                                                                    </button>
                                                                </a>
                                                           
                                                                
                                                                @if($socio->tipo_socio  == 'P' && (Auth::user()->direcao || $socio->id = Auth::user()->id))
                                                                    
                                                                    @if(Storage::disk("local")->exists("docs_piloto/licenca_".$socio->id.'.pdf'))
                                                                        <br>
                                                                        <a href="{{route('socios.mostrarlicenca', $socio->id)}}">
                                                                            <button type="submit" class="btn btn-block btn-secondary" name="ok">Mostrar licença</button>
                                                                        </a><br>
                                                                    @endif
                                                                    
                                                                    @if(Storage::disk("local")->exists("docs_piloto/certificado_".$socio->id.'.pdf'))
                                                                        <a href="{{route('socios.mostrarcertificado', $socio->id)}}">
                                                                            <button type="submit" class="btn btn-block btn-secondary" name="ok">Mostrar certificado</button>
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                                <br>
                                                                    <form
                                                                        action="{{ route('socios.delete', $socio) }}"
                                                                        method="post"
                                                                        class="form-inline">
                                                                        <input
                                                                            class="btn btn-block btn-danger text-uppercase"
                                                                            type="submit"
                                                                            value="Remover"/>
                                                                        <input type="hidden" name="_method" value="delete"/> {!!csrf_field()!!}
                                                                    </form>
                                                                    <br>
                                                                    @can('updateAll', 'App\User')
                                                                        <form method="POST" class="form-ad" action="{{route('socios.quota', $socio)}}" >
                                                                            {!!csrf_field()!!}
                                                                            @method('patch')
            
                                                                            <input type="hidden" name="quota_paga" value="">
                                                                            <button type="submit" class="btn btn-block btn-success" >Inverter estado da quota</button>
                                                                        </form>
                                                                        <br>
                                                                            <form  method="POST" class="form-ad" action="{{route('socios.ativar', $socio)}}">
                                                                                {!!csrf_field()!!}
                                                                                @method('patch')
                                                                                <input type="hidden" name="ativo" value="">
                                                                                <button type="submit" class="btn btn-block btn-success">Ativar/Desativar</button>
                                                                                <br>
                                                                            </form>
                                                                    @endcan
                                                                                
                                                            </td>
                                                            </tr>
                                                @endforeach
                                                        </tbody>
                                                        </table>
                                                            </div>
                                                            {{$pesquisa->appends(request()->except('page'))->links() }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
            @endcan
@endsection