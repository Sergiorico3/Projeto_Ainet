@extends ('layouts.app')
@section('title', 'Adicionar novo socio')
@section('content')
<form action="{{ action('UserController@store', $socio) }}" method="post" class="form-group">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="inputFullname">Número de sócio</label>
        <input
            type="text" class="form-control"
            name="inputNomeInformal" id="inputNomeInformal"
            placeholder="Introduza o nome informal" value="{{old('nome_informal',$socio->nome_informal)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Nome informal deve conter apenas letras"/>
    </div>

    <div class="form-group">
        <label for="inputFullname">Nome informal</label>
        <input
            type="text" class="form-control"
            name="inputNomeInformal" id="inputNomeInformal"
            placeholder="Introduza o nome informal" value="{{old('nome_informal',$socio->nome_informal)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Nome informal deve conter apenas letras"/>
    </div>

    <div class="form-group">
        <label for="inputFullname">Nome completo</label>
        <input
            type="text" class="form-control"
            name="inputNomeInformal" id="inputNomeInformal"
            placeholder="Introduza o nome informal" value="{{old('nome_informal',$socio->nome_informal)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Nome informal deve conter apenas letras"/>
    </div>

    <div class="form-group">
        <label for="sexo">Sexo</label><br>
        <label for="masculino">Masculino</label>
        <input type="radio" name="gender" id="masculino" value="masculino"><br>
        <label for="feminino">Feminino</label>
        <input type="radio" name="gender" id="feminino" value="feminino"><br><br>

    </div>

    <div class="form-group">
        Data de nascimento:
        <input type="date" name="dataNascimento">
    </div>

    <div class="form-row align-items-center">
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInput">Name</label>
    <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="exemplo">
    </div>
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInputGroup">Username</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
        <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="gmail.com">
    </div>
    </div>
    <div class="col-auto">
    </div>
    <div class="col-auto">
    </div>
    </div>  

    <input type="file" name="pic" accept="image/*">

    <div class="form-group">
        <label for="inputEmail">NIF</label>
        <input
            type="number" class="form-control"
            name="email" id="inputEmail"
            placeholder="Endereço e-mail" value="{{old('email', $socio->email)}}"
            required 
            pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
            title="O e-mail deve estar bem formatado"/>
    </div>

    <div class="form-group">
        <label for="inputType">Tipo sócio</label>
        <select name="type" id="inputType" class="form-control">
            <option disabled selected> -- Selecione o tipo de sócio -- </option>
            <option value="P" {{strval(old('type',$socio->type))=='P' ?"selected": ""}}>Piloto</option>
            <option value="NP" {{strval(old('type',$socio->type))=='NP' ?"selected": ""}}>Não piloto</option> //intval passa para inteiro
            <option value="A" {{strval(old('type',$socio->type))=='A' ?"selected": ""}}>Aeromodelista</option>
        </select>
    </div>

    <div class="form-group">
        <label for="sexo">Quotas em dia</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="gender" id="masculino" value="masculino"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="gender" id="feminino" value="feminino"><br><br>
    </div>

    <div class="form-group">
        <label for="sexo">Sócio ativo</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="gender" id="masculino" value="masculino"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="gender" id="feminino" value="feminino"><br><br>
    </div>

    <div class="form-group">
        <label for="sexo">Direção</label><br>
        <label for="masculino">Sim</label>
        <input type="radio" name="gender" id="masculino" value="masculino"><br>
        <label for="feminino">Não</label>
        <input type="radio" name="gender" id="feminino" value="feminino"><br><br>
        
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Criar</button>
        <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection