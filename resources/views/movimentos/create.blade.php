@extends ('layouts.app')
@section('title', 'Adicionar novo movimento')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="card  col-sm-10 col-md-10 card-signin my-14">
            <div class="card-body">
                    <h5 class="card-title text-center">Registar novo movimento</h5>

                    <form method="POST" action="{{route('movimentos.store')}}" class="form-group" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <br>

                        <div class="col-sm-12 col-md-4">
                            Data:
                            <input type="date" name="data" required>
                            <br><br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="hora_descolagem">Hora descolagem</label>
                            <input
                                type="datetime" class="form-control"
                                name="hora_descolagem" id="hora_descolagem"
                                placeholder="Hora descolagem"
                                required 
                                pattern="^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$"
                                title="Deve introduzir uma hora válida"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="hora_aterragem">Hora aterragem</label>
                            <input
                                type="datetime" class="form-control"
                                name="hora_aterragem" id="hora_aterragem"
                                placeholder="Hora aterragem"
                                required 
                                pattern="^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$"
                                title="Deve introduzir uma data válida"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="modelo">Matricula Aeronave</label>
                            <select name="aeronave">
                                @foreach($aeronaves as $aeronave)
                                    <option value="{{$aeronave->matricula}}">{{$aeronave->matricula}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_diario">Nº diário</label>
                            <input
                                type="number" class="form-control"
                                name="num_diario" id="num_diario"
                                placeholder="Nº diário" 
                                pattern="^[0-9]+$"
                                title="O n.º de diário deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_servico">Nº serviço</label>
                            <input
                                type="number" class="form-control"
                                name="num_servico" id="num_servico"
                                placeholder="Nº serviço"
                                required 
                                pattern="^[0-9]+$"
                                title="O n.º de serviço deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <label for="piloto_id">Piloto</label>
                            <select name="piloto_id">
                                @foreach($pilotos as $piloto)
                                    <option value="{{$piloto->id}}">{{$piloto->id . ' - ' . $piloto->name}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <label for="instrutor_id">Instrutor</label>
                            <select name="instrutor_id">
                                @foreach($intrutores as $instrutor)
                                    <option value="{{$instrutor->id}}">{{$instrutor->id . ' - ' . $instrutor->name}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="modelo">Matricula Aeronave</label>
                            <select name="aeronave">
                                @foreach($aeronaves as $aeronave)
                                    <option value="{{$aeronave->matricula}}">{{$aeronave->matricula}}</option>
                                @endforeach
                            </select> 
                        </div>


                        <div class="col-sm-12 col-md-4">
                            <label for="natureza">Natureza do voo</label>
                            <select name="natureza" id="natureza" class="form-control">
                                <option disabled selected> -- Selecione a natureza do voo -- </option>
                                <option value="T">Treino</option>
                                <option value="I">Instrução</option>
                                <option value="E">Especial</option>
                            </select>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="modelo">Aerodromo de partida</label>
                            <select name="aerodromo_partida">
                                @foreach($aerodromos as $aerodromo)
                                    <option value="{{$aerodromo->code}}">{{$aerodromo->nome}}</option>
                                @endforeach
                            </select> 
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="modelo">Aerodromo de chegada</label>
                            <select name="aerodromo_chegada">
                                @foreach($aerodromos as $aerodromo)
                                    <option value="{{$aerodromo->code}}">{{$aerodromo->nome}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-4">
                            <label for="num_aterragens">Nº aterragens</label>
                            <input
                                type="number" class="form-control"
                                name="num_aterragens" id="num_aterragens"
                                placeholder="Nº aterragens"
                                required 
                                pattern="^[0-9]+$"
                                title="O nº aterragens deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_descolagens">Nº descolagens</label>
                            <input
                                type="number" class="form-control"
                                name="num_descolagens" id="num_descolagens"
                                placeholder="Nº descolagens"
                                required 
                                pattern="^[0-9]+$"
                                title="O nº descolagens deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_pessoas">Nº pessoas a bordo</label>
                            <input
                                type="number" class="form-control"
                                name="num_pessoas" id="num_pessoas"
                                placeholder="Nº pessoas"
                                required 
                                pattern="^[0-9]+$"
                                title="O nº pessoas a bordo deve conter apenas números"/>
                                <br>
                        </div>  

                        <div class="col-sm-12 col-md-4">
                            <label for="conta_horas_inicio">Conta horas início</label>
                            <input
                                type="number" class="form-contol"
                                name="conta_horas_inicio" id="conta_horas_inicio"
                                placeholder="Conta horas início"
                                required 
                                pattern="^[0-9]+$"
                                title="Conta horas início deve conter apenas números"/>
                                <br><br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="conta_horas_fim">Conta horas fim</label>
                            <input
                                type="number" class="form-control"
                                name="conta_horas_fim" id="conta_horas_fim"
                                placeholder="Conta horas fim"
                                required 
                                pattern="^[0-9]+$"
                                title="Conta horas fim deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="tempo_voo">Tempo voo</label>
                            <input
                                type="number" class="form-control"
                                name="tempo_voo" id="tempo_voo"
                                placeholder="Tempo voo"
                                required 
                                pattern="^[0-9]+$"
                                title="Tempo voo fim deve conter apenas números"/>
                                <br>
                        </div>   
                        
                        <div class="col-sm-12 col-md-4">
                            <label for="tempo_voo">Preço voo</label>
                            <input
                                type="number" class="form-control"
                                name="preco_voo" id="preco_voo"
                                placeholder="Preço voo"
                                required 
                                pattern="^[0-9]+$"
                                title="Preço voo fim deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="natureza">Método de pagamento</label>
                            <select name="modo_pagamento" id="modo_pagamento" class="form-control">
                                <option disabled selected> -- Selecione o método de pagamento -- </option>
                                <option value="N">Numerário</option>
                                <option value="M">Multibanco</option>
                                <option value="T">Transferência</option>
                                <option value="P">Pacote de horas</option>
                            </select>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_recibo">Nº recibo</label>
                            <input
                                type="number" class="form-control"
                                name="num_recibo" id="num_recibo"
                                placeholder="Nº recibo"
                                required 
                                pattern="^[0-9]+$"
                                title="Nº recibo fim deve conter apenas números"/>
                                <br>
                        </div>
                        
                        <div class="form-label-group">
                                <textarea
                                   
                                    class="form-control"
                                    name="observacoes"
                                    id="inputObservacoes"
                                    placeholder="observacoes"
                                    autofocus="autofocus">{{ old('observacoes', $movimento->observacoes) }}c</textarea>
                                <label for="inputObservacoes">Observações</label>
                                @if ($errors->has('observacoes'))
                                <em>{{ $errors->first('observacoes') }}</em>
                                @endif
                            </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <button type="submit" class="btn btn-success" name="ok">Criar</button>
                            <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection