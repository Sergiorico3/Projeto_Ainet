@extends ('layouts.app') @section('title', 'Adicionar novo socio')
@section('content')
<div class="container">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Criar aeronave</h5>

                <form
                    action="{{route('aeronaves.store')}}"
                    method="post"
                    class="form-group"
                    enctype="multipart/form-data">
                    @csrf @method('POST')
                    <br><br><br>
                    <div class="col-sm-12 col-md-4">
                        <label for="matricula">Matricula</label>
                        <input
                            type="text"
                            class="form-control"
                            name="matricula"
                            id="matricula"
                            placeholder="Introduza a matricula"
                            required="required"
                            pattern="^[A-Za-z0-9]+$"
                            title="A matricula deve contrer apenas letras e números"/>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="marca">Marca</label>
                        <input
                            type="text"
                            class="form-control"
                            name="marca"
                            id="marca"
                            placeholder="Introduza a marca"
                            required="required"
                            pattern="^[a-zA-ZÀ-ú\s]+$"
                            title="A marca deve conter apenas letras"/>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="modelo">Modelo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="modelo"
                            id="modelo"
                            placeholder="Introduza o modelo"
                            required="required"
                            pattern="^[A-Za-z0-9\-]+$"
                            title="O modelo deve conter apenas letras numeros e cifrão"/>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="num_lugares">Nº de lugares</label>
                        <input
                            type="number"
                            class="form-control"
                            name="num_lugares"
                            id="num_lugares"
                            placeholder="Nº de lugares"
                            required="required"
                            pattern="^[0-9]+$"
                            title="O nº de lugares deve conter apenas números"/>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="conta_horas">Nº de horas</label>
                        <input
                            type="number"
                            class="form-control"
                            name="conta_horas"
                            id="conta_horas"
                            placeholder="Nº de horas"
                            required="required"
                            pattern="^[0-9]+$"
                            title="O nº horas deve conter apenas números"/>
                        <br>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <label for="preco_hora">Preço hora</label>
                        <input
                            type="number"
                            class="form-control"
                            name="preco_hora"
                            id="preco_hora"
                            placeholder="Preço hora"
                            required="required"
                            pattern="^[0-9]+$"
                            title="O preço/hora deve conter apenas números"/>
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