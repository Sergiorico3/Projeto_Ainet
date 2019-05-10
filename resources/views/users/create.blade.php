@extends ('layouts.app')
@section('title', 'Adicionar novo socio')
@section('content')
    <div class="form-group">
        <label for="inputFullname">Fullname</label>
        <input
            type="text" class="form-control"
            name="name" id="inputFullname"
            placeholder="Fullname" value="{{old('name',$socio->name)}}"
            required
            pattern="^[a-zA-ZÀ-ú\s]+$"
            title="Fullname must only contain letters"
            />
    </div>
    <div class="form-group">
        <label for="inputType">Type</label>
        <select name="type" id="inputType" class="form-control">
            <option disabled selected> -- select an option -- </option>
            <option value="0" {{strval(old('type',$socio->type))=='0' ?"selected": ""}}>Administrator</option>
            <option value="1" {{strval(old('type',$socio->type))=='1' ?"selected": ""}}>Publisher</option> //intval passa para inteiro
            <option value="2" {{strval(old('type',$socio->type))=='2' ?"selected": ""}}>Client</option>
        </select>
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input
            type="email" class="form-control"
            name="email" id="inputEmail"
            placeholder="Email address" value="{{old('email', $socio->email)}}"
            required 
            pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$"
            title="Email must be properly formatted"
            />
    </div>

@endsection