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
                
                <form action="{{ action('UserController@index', $user->id) }}" method="post">

                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Fullname</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $user->email }}
                                </td>
                                <td>{{ $user->name }}
                                </td>
                            </tr>
                        </tbody>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection