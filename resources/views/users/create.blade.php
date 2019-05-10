@extends ('layouts.app')
@section('title', 'Adicionar novo socio')
@section('content')
<form method="post" action="{{route('socios.store')}}"  class="form-group">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="num_socio">Número de sócio</label>
        <input
            type="text" class="form-control"
            name="num_socio" id="num_socio"
            placeholder="Introduza o nome informal" value="{{old('num_socio',$socio->num_socio)}}"
            required
            pattern="^[0-9]+$"
            title="Número de sócio deve de conter apenas numeros"/>
    </div>

    <div class="form-group">
        <label for="nome_informal">Nome informal</label>
        <input
            type="text" class="form-control"
            name="nome_informal" id="nome_informal"
            placeholder="Introduza o nome informal" value="{{old('nome_informal',$socio->nome_informal)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Nome informal deve conter apenas letras"/>
    </div>

    <div class="form-group">
        <label for="name">Nome completo</label>
        <input
            type="text" class="form-control"
            name="name" id="name"
            placeholder="Introduza o nome completo" value="{{old('name',$socio->name)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Nome completo deve conter apenas letras"/>
    </div>

    <div class="form-group">
        <label for="sexo">Sexo</label><br>
        <label for="masculino">Masculino</label>
        <input type="radio" name="sexo" id="masculino" value="masculino"><br>
        <label for="feminino">Feminino</label>
        <input type="radio" name="sexo" id="feminino" value="feminino"><br>

    </div>

    <div class="form-group">
        Data de nascimento:
        <input type="date" name="data_nascimento">
    </div>

    <div class="form-group">
    <label for="inputEmail">Email</label>
    <input
        type="email" class="form-control"
        name="email" id="inputEmail"
        placeholder="Endereço de e-mail" value="{{old('email', $socio->email)}}"
        required 
        
        title="Email must be properly formatted"
        />
    </div>

    <input type="file" name="pic" accept="image/*">

    <div class="form-group">
        <label for="nif">NIF</label>
        <input
            type="number" class="form-control"
            name="nif" id="nif"
            placeholder="NIF" value="{{old('nif', $socio->nif)}}"
            required 
            pattern="^[0-9]+$"
            title="O NIF deve conter apenas números"/>
    </div>

    <div class="form-group">
        <label for="tipo_socio">Tipo sócio</label>
        <select name="tipo_socio" id="tipo_socio" class="form-control">
            <option disabled selected> -- Selecione o tipo de sócio -- </option>
            <option value="P" {{strval(old('tipo_socio',$socio->tipo_socio))=='P' ?"selected": ""}}>Piloto</option>
            <option value="NP" {{strval(old('tipo_socio',$socio->tipo_socio))=='NP' ?"selected": ""}}>Não piloto</option>
            <option value="A" {{strval(old('tipo_socio',$socio->tipo_socio))=='A' ?"selected": ""}}>Aeromodelista</option>
        </select>
    </div>

    <div class="form-group">
        <label for="quota_paga">Quotas em dia</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="quota_paga" id="1" value="1"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="quota_paga" id="0" value="0"><br>
    </div>

    <div class="form-group">
        <label for="ativo">Sócio ativo</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="ativo" id="1" value="1"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="ativo" id="0" value="0"><br>
    </div>

    <div class="form-group">
        <label for="direcao">Direção</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="direcao" id="1" value="1"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="direcao" id="0" value="0"><br>
        
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Criar</button>
        <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection