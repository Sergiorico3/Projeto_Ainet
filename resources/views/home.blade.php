@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!

                </div>
                <form action="{{route('home',['id'=>$user->id])}}" method="get">
                    @method('GET')
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Fullname</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                            </table>
                    </div>
                </form>
                
                </div>

            </div>
        </div>
    </div>
    @endsection