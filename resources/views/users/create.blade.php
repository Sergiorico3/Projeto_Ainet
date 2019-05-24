@extends ('layouts.app') @section('title', 'Adicionar novo socio')
@section('content')

<<<<<<< HEAD
<div class="row justify-content-center">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Criar sócio</h5>

                <form
                    action="{{route('socios.store')}}"
                    method="post"
                    class="form-group"
                    enctype="multipart/form-data">
                    @csrf @method('POST')

                    <div class="form-label-group">
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder="Nome completo"
                            autofocus="autofocus"
                            required="required"
                            pattern="^[a-zA-ZÀ-ú\s]+$"
                            title="Nome completo deve conter apenas letras">

                        <label for="name">Nome completo</label>
                        @if ($errors->has('name'))
                        <em>{{ $errors->first('name') }}</em>
                        @endif
                    </div>

                    <div class="form-label-group">
                        <input
                            type="text"
                            class="form-control"
                            name="num_socio"
                            id="num_socio"
                            placeholder="N.º sócio"
                            autofocus="autofocus"
                            required="required"
                            pattern="^[0-9]+$"
                            title="Número de sócio deve conter apenas numeros">

                        <label for="num_socio">Número de sócio</label>
                        @if ($errors->has('num_socio'))
                        <em>{{ $errors->first('num_socio') }}</em>
                        @endif
                    </div> 

                    <div class="form-label-group">
                        <input
                            type="text"
                            class="form-control"
                            name="nome_informal"
                            id="nome_informal"
                            placeholder="Nome informal"
                            autofocus="autofocus"
                            required="required"
                            pattern="^[a-zA-ZÀ-ú\s]+$"
                            title="Nome informal deve conter apenas letras">

                        <label for="nome_informal">Nome informal</label>
                        @if ($errors->has('nome_informal'))
                        <em>{{ $errors->first('nome_informal') }}</em>
                        @endif
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="sexo">Sexo</label><br>
                        <label for="Masculino">Masculino</label>
                        <input type="radio" name="sexo" id="M" value="M"><br>
                        <label for="Feminino">Feminino</label>
                        <input type="radio" name="sexo" id="F" value="F"><br>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        Data de nascimento:
                        <input type="date" name="data_nascimento" required="required">
                        <br>
                    </div>
                    <br>
                    <div class="form-label-group">
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="inputEmail"
                            placeholder="Endereço de e-mail"
                            autofocus="autofocus"
                            required="required"
                            pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
                            title="Email tem que estar formatado corretamente">

                        <label for="inputEmail">Email</label>
                        @if ($errors->has('inputEmail'))
                        <em>{{ $errors->first('inputEmail') }}</em>
                        @endif
                    </div>
                    
                    <div class="col-sm-12 col-md-4">
                        <input type="file" name="foto_url" accept="image/*">
                    </div>
                    <br>
                    <div class="form-label-group">
                        <input
                            type="text"
                            class="form-control"
                            name="nif"
                            id="nif"
                            placeholder="NIF"
                            autofocus="autofocus"
                            required="required"
                            pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
                            title="O NIF deve conter apenas números">

                        <label for="nif">NIF</label>
                        @if ($errors->has('nif'))
                        <em>{{ $errors->first('nif') }}</em>
                        @endif
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="tipo_socio">Tipo sócio</label>
                        <select name="tipo_socio" id="tipo_socio" class="form-control">
                            <option disabled="disabled" selected="selected">
                                -- Selecione o tipo de sócio --
                            </option>
                            <option value="P">Piloto</option>
                            <option value="NP">Não piloto</option>
                            <option value="A">Aeromodelista</option>
                        </select>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="quota_paga">Quotas em dia</label><br>
                        <label for="masculino">Sim</label>
                        <input type="radio" name="quota_paga" id="1" value="1"><br>
                        <label for="feminino">Não</label>
                        <input type="radio" name="quota_paga" id="0" value="0"><br>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="ativo">Sócio ativo</label><br>
                        <label for="masculino">Sim</label>
                        <input type="radio" name="ativo" id="1" value="1"><br>
                        <label for="feminino">Não</label>
                        <input type="radio" name="ativo" id="0" value="0"><br>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="direcao">Direção</label><br>
                        <label for="masculino">Sim</label>
                        <input type="radio" name="direcao" id="1" value="1"><br>
                        <label for="feminino">Não</label>
                        <input type="radio" name="direcao" id="0" value="0"><br>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-success" name="ok">Criar</button>
                        <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
=======
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de sócios</div>
                    <form action="{{route('socios.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <br>
                        <div class="col-sm-12 col-md-4">
                            <label for="name">Nome completo</label>
                            <input
                                type="text" class="form-control"
                                name="name" id="name"
                                placeholder="Introduza o nome completo"
                                required
                                pattern="^[a-zA-ZÀ-ú\s]+$"
                                title="Nome completo deve conter apenas letras"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="num_socio">Número de sócio</label>
                            <input
                                type="text" class="form-control"
                                name="num_socio" id="num_socio"
                                placeholder="Introduza o nome informal"
                                required
                                pattern="^[0-9]+$"
                                title="Número de sócio deve de conter apenas numeros"/>
                                <br>
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <label for="nome_informal">Nome informal</label>
                            <input
                                type="text" class="form-control"
                                name="nome_informal" id="nome_informal"
                                placeholder="Introduza o nome informal"
                                required
                                pattern="^[a-zA-ZÀ-ú\s]+$"
                                title="Nome informal deve conter apenas letras"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="sexo">Sexo</label><br>
                            <label for="Masculino">Masculino</label>
                            <input type="radio" name="sexo" id="M" value="M"><br>
                            <label for="Feminino">Feminino</label>
                            <input type="radio" name="sexo" id="F" value="F"><br>
                            <br>
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            Data de nascimento:
                            <input type="date" name="data_nascimento" required>
                            <br>
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                        <label for="inputEmail">Email</label>
                        <input
                            type="email" class="form-control"
                            name="email" id="inputEmail"
                            placeholder="Endereço de e-mail"
                            pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
                            required 
                            title="Email must be properly formatted"/>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <input type="file" name="foto_url" accept="image/*">
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="nif">NIF</label>
                            <input
                                type="number" class="form-control"
                                name="nif" id="nif"
                                placeholder="NIF"
                                pattern="^[0-9]+$"
                                title="O NIF deve conter apenas números"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="tipo_socio">Tipo sócio</label>
                            <select name="tipo_socio" id="tipo_socio" class="form-control">
                                <option disabled selected> -- Selecione o tipo de sócio -- </option>
                                <option value="P">Piloto</option>
                                <option value="NP">Não piloto</option>
                                <option value="A">Aeromodelista</option>
                            </select>
                            <br>
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <label for="quota_paga">Quotas em dia</label><br>
                            <label for="masculino">Sim</label>
                            <input type="radio" name="quota_paga" id="1" value="1"><br>
                            <label for="feminino">Não</label>
                            <input type="radio" name="quota_paga" id="0" value="0"><br>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="ativo">Sócio ativo</label><br>
                            <label for="masculino">Sim</label>
                            <input type="radio" name="ativo" id="1" value="1"><br>
                            <label for="feminino">Não</label>
                            <input type="radio" name="ativo" id="0" value="0"><br>
                            <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="direcao">Direção</label><br>
                            <label for="masculino">Sim</label>
                            <input type="radio" name="direcao" id="1" value="1"><br>
                            <label for="feminino">Não</label>
                            <input type="radio" name="direcao" id="0" value="0"><br>
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
>>>>>>> 6279af2b732c4bb7ad8d295072b88cbd2a3eb82b

@endsection