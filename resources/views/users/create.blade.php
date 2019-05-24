@extends ('layouts.app') @section('title', 'Adicionar novo socio')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Criar sócio</div>
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

@endsection