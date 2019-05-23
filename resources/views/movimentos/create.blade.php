@extends ('layouts.app')
@section('title', 'Adicionar novo movimento')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registar novo movimento</div>
                    <form action="{{route('movimentos.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
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
                                title="Deve de introduzir uma hora válida"/>
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
                                title="Deve de introduzir uma data válida"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="aeronave">Matricula aeronave</label>
                            <input
                                type="text" class="form-control"
                                name="aeronave" id="aeronave"
                                placeholder="Introduza a matricula da aeronave"
                                required
                                pattern="^[a-zA-ZÀ-ú\s\-]+$"
                                title="A matricula da aeronave deve conter apenas letras"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_diario">Nº diário</label>
                            <input
                                type="number" class="form-control"
                                name="num_diario" id="num_diario"
                                placeholder="Nº diário"
                                required 
                                pattern="^[0-9]+$"
                                title="O nº de diário deve conter apenas números"/>
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
                                title="O nº de serviço deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="piloto_id">Piloto id</label>
                            <input
                                type="number" class="form-control"
                                name="piloto_id" id="piloto_id"
                                placeholder="Piloto id"
                                required 
                                pattern="^[0-9]+$"
                                title="O Piloto id deve conter apenas números"/>
                                <br>
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
                            <input
                                type="text" class="form-control"
                                name="aerodromo_partida" id="aerodromo_partida"
                                placeholder="Introduza o aerodromo de partida"
                                required
                                pattern="^[A-Za-z\-]+$"
                                title="O aerodromo de partida deve conter apenas letras e/ou cifrão"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="modelo">Aerodromo de chegada</label>
                            <input
                                type="text" class="form-control"
                                name="aerodromo_chegada" id="aerodromo_chegada"
                                placeholder="Introduza o aerodromo de chegada"
                                required
                                pattern="^[A-Za-z\-]+$"
                                title="O aerodromo de chegada deve conter apenas letras e/ou cifrão"/>
                                <br>
                        </div>

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
                                placeholder="Nº aterragens"
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
                                <br>
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
                        
                        <div class="col-sm-12 col-md-4">
                            <label for="observacoes">Observações</label>
                            <input
                                type="text" class="form-control"
                                name="observacoes" id="observacoes"
                                placeholder="Observações"
                                required
                                pattern="^[a-zA-ZÀ-ú\s]+$"
                                title="As observações devem conter apenas letras"/>
                                <br>
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