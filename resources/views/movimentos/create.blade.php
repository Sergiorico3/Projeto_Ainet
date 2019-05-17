@extends ('layouts.app')
@section('title', 'Adicionar novo movimento')
@section('content')

<form action="{{route('movimentos.store')}}" method="post" class="form-group" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <br><br><br>

    <div class="col-sm-12 col-md-4">
        Data:
        <input type="date" name="data" required>
        <br>
    </div>

    <div class="col-sm-12 col-md-4">
        <label for="hora_descolagem">Hora descolagem</label>
        <input
            type="number" class="form-control"
            name="hora_descolagem" id="hora_descolagem"
            placeholder="Hora descolagem"
            required 
            pattern="^[0-9]+$"
            title="Deve de introduzir uma data válida"/>
            <br>
    </div>

    <div class="col-sm-12 col-md-4">
        <label for="hora_aterragem">Hora aterragem</label>
        <input
            type="number" class="form-control"
            name="hora_aterragem" id="hora_aterragem"
            placeholder="Hora aterragem"
            required 
            pattern="^[0-9]+$"
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
            pattern="^[a-zA-ZÀ-ú\s]+$"
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
        <label for="marca">Marca</label>
        <input
            type="text" class="form-control"
            name="marca" id="marca"
            placeholder="Introduza a marca"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="A marca deve conter apenas letras"/>
            <br>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <label for="modelo">Modelo</label>
        <input
            type="text" class="form-control"
            name="modelo" id="modelo"
            placeholder="Introduza o modelo"
            required
            pattern="^[A-Za-z0-9\-]+$"
            title="O modelo deve conter apenas letras numeros e cifrão"/>
            <br>
    </div>

    <div class="col-sm-12 col-md-4">
        <label for="num_lugares">Nº de lugares</label>
        <input
            type="number" class="form-control"
            name="num_lugares" id="num_lugares"
            placeholder="Nº de lugares"
            required 
            pattern="^[0-9]+$"
            title="O nº de lugares deve conter apenas números"/>
            <br>
    </div>

    <div class="col-sm-12 col-md-4">
        <label for="conta_horas">Nº de horas</label>
        <input
            type="number" class="form-control"
            name="conta_horas" id="conta_horas"
            placeholder="Nº de horas"
            required 
            pattern="^[0-9]+$"
            title="O nº horas deve conter apenas números"/>
            <br>
    </div>

    <div class="col-sm-12 col-md-4">
        <label for="preco_hora">Preço hora</label>
        <input
            type="number" class="form-control"
            name="preco_hora" id="preco_hora"
            placeholder="Preço hora"
            required 
            pattern="^[0-9]+$"
            title="O preço/hora deve conter apenas números"/>
            <br>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <button type="submit" class="btn btn-success" name="ok">Criar</button>
        <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@endsection