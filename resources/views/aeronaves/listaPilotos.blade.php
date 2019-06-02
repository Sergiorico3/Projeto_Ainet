@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card card-signin my-3">
                <div class="card-body">
                    <h5 class="card-title text-center">Pilotos autorizados</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Piloto ID</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aeronaves_pilotos as $aeronaves_piloto)
                                <tr>
                                    <td scope="row">{{$aeronaves_piloto->matricula}}</td>
                                    <td scope="row">{{$aeronaves_piloto->piloto_id}}</td>
                                    <td scope="row">
                                        <form method="POST" class="form-ad" action="{{route('aeronaves.remover', [$aeronaves_piloto->matricula, $aeronaves_piloto->piloto_id])}}">
                                            {!!csrf_field()!!}
                                            @method('delete')
                                            <input type="hidden" name="ativo" value="">
                                            <button type="submit" class="btn btn-block btn-google">Remover</button>
                                            <br>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-auto">
            <div class="card card-signin my-3">
                <div class="card-body">
                    <h5 class="card-title text-center">Pilotos não autorizados</h5>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Piloto ID</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aeronaves_nao_autorizados as $aeronaves_nao_autorizado)
                                <tr>
                                    <td scope="row">{{$aeronaves_nao_autorizado->piloto_id}}</td>
                                    <td scope="row">
                                        <form method="POST" class="form-ad" action="{{route('aeronaves.acrescentar', [$aeronaves_piloto->matricula, $aeronaves_piloto->piloto_id])}}">
                                            {!!csrf_field()!!}
                                            @method('POST')
                                            <input type="hidden" name="ativo" value="">
                                            <button type="submit" class="btn btn-block btn-facebook">Autorizar</button>
                                            <br>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection