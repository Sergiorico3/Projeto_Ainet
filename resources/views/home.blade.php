@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                @if(session('msgglobal'))
                <div class ="alert alert-success">
                    {{ session('msgglobal') }}
                </div>
                @endif

                    @if (session('status'))
                    <div class="alert alert-success" >
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!

                </div>
                
                <body background="https://www.publicdomainpictures.net/pictures/260000/velka/paper-plane.jpg">
                   
                </div>

            </div>
        </div>
    </div>
   


    @endsection