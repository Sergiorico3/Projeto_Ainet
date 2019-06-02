@extends('layouts.app') @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Mapa de aeronaves</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Unidade</th>
                                    <th scope="col">Minutos</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($aeronave->valores as $unidades=>$valor)
                                <tr>
                                    <td scope="row">
                                        {{$unidades+1}}</td>
                                    <td scope="row">
                                        <input style='width:auto' name="tempos[{{$unidades+1}}]" value="{{old('tempos.'.$unidades,$valor->minutos)}}" readonly="readonly">
                                    </td>
                                    <td scope="row">
                                        <input style='width:auto' name="precos[{{$unidades+1}}]" value=" {{old('precos.'.$unidades,$valor->preco)}} " readonly="readonly">
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col  mx-auto">
            <br><br>
            <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Aeronave</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Número de lugares</th>
                                    <th scope="col">Conta horas</th>
                                    <th scope="col">Preço hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{$aeronave->matricula}}</td>
                                    <td scope="row">{{$aeronave->marca}}</td>
                                    <td scope="row">{{$aeronave->modelo}}</td>
                                    <td scope="row">{{$aeronave->num_lugares}}</td>
                                    <td scope="row">{{$aeronave->conta_horas}}</td>
                                    <td scope="row">{{$aeronave->preco_hora}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Editar aeronave</h5>

                    <form method="POST" action="{{route('aeronaves.update',$aeronave)}}" class="form-signin" enctype="multipart/form-data">
                        @method('PUT') @csrf
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="marca" id="inputMarca" placeholder="Marca" value="{{ old('marca', $aeronave->marca) }}">
                            <label for="inputName">Marca</label>
                            @if ($errors->has('marca'))
                            <em>{{ $errors->first('marca') }}</em>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" name="modelo" id="inputModelo" placeholder="Modelo" value="{{ old('modelo', $aeronave->modelo) }}">
                            <label for="inputName">Modelo</label>
                            @if ($errors->has('modelo'))
                            <em>{{ $errors->first('modelo') }}</em>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" name="num_lugares" id="inputNumLugares" placeholder="Número de lugares" value="{{ old('num_lugares', $aeronave->num_lugares) }}">
                            <label for="inputName">Número de lugares</label>
                            @if ($errors->has('num_lugares'))
                            <em>{{ $errors->first('num_lugares') }}</em>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" name="conta_horas" id="inputNameInformal" placeholder="Conta horas" value="{{ old('conta_horas', $aeronave->conta_horas) }}">
                            <label for="inputName">Conta horas</label>
                            @if ($errors->has('conta_horas'))
                            <em>{{ $errors->first('conta_horas') }}</em>
                            @endif
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" name="preco_hora" id="inputPrecoHora" placeholder="preco_hora" value="{{ old('preco_hora', $aeronave->preco_hora) }}">
                            <label for="inputName">Preço hora</label>
                            @if ($errors->has('preco_hora'))
                            <em>{{ $errors->first('preco_hora') }}</em>
                            @endif
                        </div>

                        <hr class="my-4">
                        <button type="submit" class="btn btn-lg btn-google btn-block text-uppercase" name="ok">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection