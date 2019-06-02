@extends ('layouts.app') @section('title', 'Mudar password sócio')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mudar password</div>
                    <form method="post" action="{{route('socios.changepasswordstore')}}"  class="form-group" enctype="multipart/form-data">
                        @method('patch') @csrf

                        <br>

                        <div class="col-sm-12 col-md-4">
                            <label for="name">Password antiga</label>
                            <input
                                type="password" class="form-control"
                                name="old_password" id="old_password"
                                placeholder="Introduza a password antiga"
                                required
                                pattern="^[a-zA-Z0-9\s]+$"
                                title="A password deve conter apenas letras, numeros e simbolos"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="name">Nova password</label>
                            <input
                                type="password" class="form-control"
                                name="password" id="password"
                                placeholder="Introduza a nova password"
                                required
                                pattern="^[a-zA-Z0-9\s]+$"
                                title="A password deve conter apenas letras, numeros e simbolos"/>
                                <br>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <label for="name">Confirme nova password</label>
                            <input
                                type="password" class="form-control"
                                name="password_confirmation" id="password_confirmation"
                                placeholder="Confirme a nova password"
                                required
                                pattern="^[a-zA-Z0-9\s]+$"
                                title="A password deve conter apenas letras, numeros e simbolos"/>
                                <br>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <button type="submit" class="btn btn-success" name="ok">Alterar</button>
                            <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection