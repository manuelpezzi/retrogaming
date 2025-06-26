@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="bg-warning">
        <div class="jumbotron p-5 mb-4  rounded-3">

            <h1 class="display-5 fw-bold text-center ">
                benvenuto in Retrogaming <i class="fas fa-gamepad"></i>
            </h1>
            <p class="col-md-8 fs-4 text-center m-auto">
                questo sito è stato realizzato per creare la tua collezione perfetta dei giochi che anno accompagnato la
                tua
                infanzia
            </p>
            <a href="{{url('/videogames') }}" class="btn btn-primary btn-lg d-grid gap-2 col-2 mx-auto" type="button">go to
                retrogaming</a>
        </div>


        <div class="content">
            <div class="container">
                <p class="text-center">
                    "La vita è come un gioco. Prima devi imparare le regole del gioco, e poi giocarlo meglio di chiunque
                    altro."
                    - Albert Einstein

                </p>
            </div>
        </div>
    </div>

@endsection