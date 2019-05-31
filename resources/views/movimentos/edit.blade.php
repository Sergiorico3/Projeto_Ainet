@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Movimento</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Data do voo
                                    </th>
                                    <th scope="col">
                                        Hora descolagem
                                    </th>
                                    <th scope="col">
                                        Hora aterragem
                                    </th>
                                    <th scope="col">
                                        Aeronave
                                    </th>
                                    <th scope="col">
                                        N.º Diário
                                    </th>
                                    <th scope="col">
                                        N.º Serviço
                                    </th>
                                    <th scope="col">
                                        Piloto
                                    </th>
                                    <th scope="col">
                                        Natureza do voo
                                    </th>
                                    <th scope="col">
                                        Aeródromo de partida</th>
                                    <th scope="col">
                                        Aeródromo de chegada</th>
                                    <th scope="col">
                                        N.º aterragens</th>
                                    <th scope="col">
                                        N.º de descolagens
                                    </th>
                                    <th scope="col">
                                        N.º de pessoas a bordo</th>
                                    <th scope="col">
                                        Conta-horas incial</th>
                                    <th scope="col">
                                        Conta-horas final</th>
                                    <th scope="col">
                                        Tempo voo</th>
                                    <th scope="col">
                                        Preço voo</th>
                                    <th scope="col">
                                        Modo de pagamento</th>
                                    <th scope="col">
                                        N.º de recibo
                                    </th>
                                    <th scope="col">
                                        Observações</th>
                                    <!-- Caso seja relativo a um voo de instrução -->
                                    <th scope="col">
                                        Tipo de instrução
                                    </th>
                                    <th scope="col">
                                        Instrutor
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{$movimento->data}}</td>
                                    <td scope="row">{{$movimento->hora_descolagem}}</td>
                                    <td scope="row">{{$movimento->hora_aterragem}}</td>
                                    <td scope="row">{{$movimento->aeronave}}</td>
                                    <td scope="row">{{$movimento->num_diario}}</td>
                                    <td scope="row">{{$movimento->num_servico}}</td>
                                    <td scope="row">{{$movimento->piloto_id}}</td>
                                    <td scope="row">{{$movimento->naturezaVooToString()}}</td>
                                    <td scope="row">{{$movimento->aerodromo_partida}}</td>
                                    <td scope="row">{{$movimento->aerodromo_chegada}}</td>
                                    <td scope="row">{{$movimento->num_aterragens}}</td>
                                    <td scope="row">{{$movimento->num_descolagens}}</td>
                                    <td scope="row">{{$movimento->num_pessoas}}</td>
                                    <td scope="row">{{$movimento->conta_horas_inicio}}</td>
                                    <td scope="row">{{$movimento->conta_horas_fim}}</td>
                                    <td scope="row">{{$movimento->tempo_voo}}</td>
                                    <td scope="row">{{$movimento->preco_voo}}</td>
                                    <td scope="row">{{$movimento->modo_pagamento}}</td>
                                    <td scope="row">{{$movimento->num_recibo}}</td>
                                    <td scope="row">{{$movimento->observacoes}}</td>
                                    <!-- Caso seja relativo a um voo de instrução -->
                                    <td scope="row">{{$movimento->tipo_instrucaoToString()}}</td>
                                    <td scope="row">{{$movimento->instrutor_id}}</td>
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
                        <h5 class="card-title text-center">Editar movimento</h5>

                        <form
                            class="form-signin"
                            action="{{ route('movimentos.update', $movimento ) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @method('put') @csrf

                            <div class="form-label-group">
                                <input
                                    type="date"
                                    class="form-control"
                                    name="data"
                                    id="inputData"
                                    placeholder="Data do voo"
                                    autofocus="autofocus"
                                    pattern="^\d{4}\-\d{1,2}\-\d{1,2}$"
                                    title="Data do voo deve ter o formato correto (exemplo: 2013-11-24)"
                                    value="{{ old('data', $movimento->data) }}">
                                <label for="inputData">Data do voo</label>
                                @if ($errors->has('data'))
                                <em>{{ $errors->first('data') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="time"
                                    class="form-control"
                                    name="hora_descolagem"
                                    id="inputHora_descolagem"
                                    placeholder="Hora de descolagem"
                                    autofocus="autofocus"
                                    pattern="^\d{4}\-\d{1,2}\-\d{1,2}$\ \d{1,2}\:\d{1,2}\:d{1,2}$"
                                    title="Deve introduzir uma hora de descolagem válida (exemplo: 2013-11-24 08:45:00)"
                                    value="{{ old('hora_descolagem', $movimento->hora_descolagem) }}">
                                <label for="inputHora_descolagem">Hora de descolagem</label>
                                @if ($errors->has('hora_descolagem'))
                                <em>{{ $errors->first('hora_descolagem') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="time"
                                    class="form-control"
                                    name="hora_aterragem"
                                    id="inputHora_aterragem"
                                    placeholder="Hora de aterragem"
                                    autofocus="autofocus"
                                    pattern="^\d{4}\-\d{1,2}\-\d{1,2}$\ \d{1,2}\:\d{1,2}\:d{1,2}$"
                                    title="Deve introduzir uma hora de descolagem válida (exemplo: 2013-11-24 08:45:00) "
                                    value="{{ old('hora_aterragem', $movimento->hora_aterragem) }}">
                                <label for="inputHora_aterragem">Hora de aterragem</label>
                                @if ($errors->has('hora_aterragem'))
                                <em>{{ $errors->first('hora_aterragem') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_diario"
                                    id="inputNum_diario"
                                    placeholder="num_diario"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º diário deve conter apenas números"
                                    value="{{ old('num_diario', $movimento->num_diario) }}">
                                <label for="inputNum_diario">N.º diário</label>
                                @if ($errors->has('num_diario'))
                                <em>{{ $errors->first('num_diario') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_servico"
                                    id="inputNum_servico"
                                    placeholder="num_servico"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º serviço deve conter apenas números"
                                    value="{{ old('num_servico', $movimento->num_servico) }}">
                                <label for="inputNum_servico">N.º serviço</label>
                                @if ($errors->has('num_servico'))
                                <em>{{ $errors->first('num_servico') }}</em>
                                @endif
                            </div>

                            <label for="natureza">Natureza do voo</label>
                            <select name="natureza" id="natureza" class="form-control">
                                <option disabled="disabled" selected="selected">
                                    -- Selecione a natureza do voo --
                                </option>
                                <option value="T">Treino</option>
                                <option value="I">Instrução</option>
                                <option value="E">Especial</option>
                            </select>
                            <br>
                            <label for="modelo">Aerodromo de partida</label>
                            <select name="aerodromo_partida" class="form-control">
                                @foreach($aerodromos as $aerodromo)
                                <option value="{{$aerodromo->code}}">{{$aerodromo->nome}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="modelo">Aerodromo de chegada</label>
                            <select name="aerodromo_chegada" class="form-control">
                                @foreach($aerodromos as $aerodromo)
                                <option value="{{$aerodromo->code}}">{{$aerodromo->nome}}</option>
                                @endforeach
                            </select>

                            <br>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_aterragens"
                                    id="inputNum_aterragens"
                                    placeholder="num_aterragens"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º de aterragens deve conter apenas números"
                                    value="{{ old('num_aterragens', $movimento->num_aterragens) }}">
                                <label for="inputNum_aterragens">N.º aterragens</label>
                                @if ($errors->has('num_aterragens'))
                                <em>{{ $errors->first('num_aterragens') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_descolagens"
                                    id="inputNum_descolagens"
                                    placeholder="num_descolagens"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º de descolagens deve conter apenas números"
                                    value="{{ old('num_descolagens', $movimento->num_descolagens) }}">
                                <label for="inputNum_descolagens">N.º descolagens</label>
                                @if ($errors->has('num_descolagens'))
                                <em>{{ $errors->first('num_descolagens') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_pessoas"
                                    id="inputNum_pessoas"
                                    placeholder="num_pessoas"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º de pessoas deve conter apenas números"
                                    value="{{ old('num_pessoas', $movimento->num_pessoas) }}">
                                <label for="inputNum_pessoas">N.º de pessoas a bordo</label>
                                @if ($errors->has('num_pessoas'))
                                <em>{{ $errors->first('num_pessoas') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="conta_horas_inicio"
                                    id="inputConta_horas_inicio"
                                    placeholder="conta_horas_inicio"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="Conta-horas início deve conter apenas números"
                                    value="{{ old('conta_horas_inicio', $movimento->conta_horas_inicio) }}">
                                <label for="inputConta_horas_inicio">Conta-horas início</label>
                                @if ($errors->has('conta_horas_inicio'))
                                <em>{{ $errors->first('conta_horas_inicio') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="conta_horas_fim"
                                    id="inputConta_horas_fim"
                                    placeholder="conta_horas_fim"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="Conta-horas fim deve conter apenas números"
                                    value="{{ old('conta_horas_fim', $movimento->conta_horas_fim) }}">
                                <label for="inputConta_horas_fim">Conta-horas fim</label>
                                @if ($errors->has('conta_horas_fim'))
                                <em>{{ $errors->first('conta_horas_fim') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="tempo_voo"
                                    id="inputTempo_voo"
                                    placeholder="tempo_voo"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="Tempo do voo deve conter apenas números"
                                    value="{{ old('tempo_voo', $movimento->tempo_voo) }}">
                                <label for="inputTempo_voo">Tempo do voo</label>
                                @if ($errors->has('tempo_voo'))
                                <em>{{ $errors->first('tempo_voo') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="preco_voo"
                                    id="inputPreco_voo"
                                    placeholder="preco_voo"
                                    autofocus="autofocus"
                                    pattern="^\d*\.?\d*$"
                                    title="Preço do voo deve conter apenas números"
                                    value="{{ old('preco_voo', $movimento->preco_voo) }}">
                                <label for="inputPreco_voo">Preço do voo</label>
                                @if ($errors->has('preco_voo'))
                                <em>{{ $errors->first('preco_voo') }}</em>
                                @endif
                            </div>

                            <label for="natureza">Método de pagamento</label>
                            <select name="modo_pagamento" id="modo_pagamento" class="form-control">
                                <option disabled="disabled" selected="selected">
                                    -- Selecione o método de pagamento --
                                </option>
                                <option value="N">Numerário</option>
                                <option value="M">Multibanco</option>
                                <option value="T">Transferência</option>
                                <option value="P">Pacote de horas</option>
                            </select>
                            <br>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_recibo"
                                    id="inputNum_recibo"
                                    placeholder="num_recibo"
                                    autofocus="autofocus"
                                    pattern="^[0-9]+$"
                                    title="N.º do recibo deve conter apenas números"
                                    value="{{ old('num_recibo', $movimento->num_recibo) }}">
                                <label for="inputNum_recibo">N.º do recibo</label>
                                @if ($errors->has('num_recibo'))
                                <em>{{ $errors->first('num_recibo') }}</em>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="observacoes"
                                    id="inputObservacoes"
                                    placeholder="observacoes"
                                    autofocus="autofocus"
                                    value="{{ old('observacoes', $movimento->observacoes) }}">
                                <label for="inputObservacoes">Observações</label>
                                @if ($errors->has('observacoes'))
                                <em>{{ $errors->first('observacoes') }}</em>
                                @endif
                            </div>

                            <hr class="my-4">
                            <button
                                type="submit"
                                class="btn btn-lg btn-google btn-block text-uppercase"
                                name="ok">Guardar</button>
                        </form>
                    </div>
            </div>
        </div>

    </div>

    @endsection