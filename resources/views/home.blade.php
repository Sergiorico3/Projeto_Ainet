@extends('layouts.master') @section('title', 'FlightClub') @section('content')
<body>
   
    <header>

        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div
                class="carousel-item active"
                style="background-image: url('https://www.publicdomainpictures.net/pictures/260000/velka/paper-plane.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4"><i class="fab fa-telegram-plane"></i> FlightClub</h2>
                    <p class="lead">Web app para gestão do Aeroclube FlightClub.</p>
                </div>
            </div>

        </div>

    </header>

    @endsection