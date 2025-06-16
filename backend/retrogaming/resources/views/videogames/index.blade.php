@extends('layouts.app')

@section('content')
    <h1>Videogames</h1>
    <a href="{{ route('videogames.create') }}" class="btn btn-primary mb-3">Add Videogame</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Year</th>
                <th>Producer</th>
                <th>Genres</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videogames as $videogame)
                <tr>
                    <td>
                        @if ($videogame->copertina_url)
                            <img src="{{ $videogame->copertina_url }}" alt="{{ $videogame->titolo }}" style="max-width: 100px;">
                        @else
                            No cover
                        @endif
                    </td>
                    <td>{{ $videogame->titolo }}</td>
                    <td>{{ $videogame->anno }}</td>
                    <td>{{ $videogame->producer->name }}</td>
                    <td>{{ $videogame->genres->pluck('name')->implode(', ') }}</td>
                    <td>
                        <a href="{{ route('videogames.show', $videogame) }}" class="btn btn-sm btn-info">Details</a>
                        <a href="{{ route('videogames.edit', $videogame) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('videogames.destroy', $videogame) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection