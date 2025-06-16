@extends('layouts.app')

@section('content')
    <h1>{{ $videogame->titolo }}</h1>
    <div class="card">
        @if ($videogame->copertina_url)
            <img src="{{ $videogame->copertina_url }}" class="card-img-top" alt="{{ $videogame->titolo }}"
                style="max-width: 300px;">
        @endif
        <div class="card-body">
            <p><strong>Year:</strong> {{ $videogame->anno }}</p>
            <p><strong>Producer:</strong> {{ $videogame->producer->name }}</p>
            <p><strong>Genres:</strong> {{ $videogame->genres->pluck('name')->implode(', ') }}</p>
            <p><strong>Description:</strong> {{ $videogame->description ?? 'No description' }}</p>
            <a href="{{ route('videogames.edit', $videogame) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('videogames.destroy', $videogame) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
            <a href="{{ route('videogames.index') }}" class="btn btn-secondary">Back to list</a>
        </div>
    </div>
@endsection