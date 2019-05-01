@extends('layouts.master') @section('title', 'Login') @section('content')

<br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Log in</h5>
                    <form class="form-signin">
                        <div class="form-label-group">
                            <input
                                type="email"
                                id="inputEmail"
                                class="form-control"
                                placeholder="Email address"
                                required="required"
                                autofocus="autofocus">
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input
                                type="password"
                                id="inputPassword"
                                class="form-control"
                                placeholder="Password"
                                required="required">
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection