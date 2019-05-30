@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-signin my-14">
                <div class="card-body">
                    <h5 class="card-title text-center">Certificado</h5>
                        <embed src="{{Storage::disk('public')->url('/docs_piloto').'/certificado_'.Auth::id().'.pdf'}}" width="800px" height="1000px" />
                </div>
            </div>
        </div>
    </div>
    @endsection