@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="jumbotron p-5 mb-4 bg-light rounded-3">

        <h1 class="display-5 fw-bold">
            benvenuto in Retrogaming <i class="fas fa-gamepad"></i>
        </h1>
        <p class="col-md-8 fs-4">
            questo sito è stato realizzato per creare la tua collezione perfetta dei giochi che anno accompagnato la
            tua
            infanzia
        </p>
        <a href="{{url('/videogames') }}" class="btn btn-primary btn-lg" type="button">go to retrogaming</a>
    </div>
    </div>

    <div class="content">
        <div class="container">
            <p>
                "La vita è come un gioco. Prima devi imparare le regole del gioco, e poi giocarlo meglio di chiunque altro."
                - Albert Einstein

            </p>
        </div>
    </div>
@endsection