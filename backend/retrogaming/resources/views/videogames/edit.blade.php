@extends('layouts.app')

@section('content')
    <h1>Edit Videogame</h1>
    <form action="{{ route('videogames.update', $videogame) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="titolo">Title</label>
            <input type="text" name="titolo" class="form-control" value="{{ old('titolo', $videogame->titolo) }}">
        </div>
        <div class="form-group mb-3">
            <label for="anno">Year</label>
            <input type="number" name="anno" class="form-control" value="{{ old('anno', $videogame->anno) }}">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $videogame->description) }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="copertina">Cover</label>
            @if ($videogame->copertina_url)
                <img src="{{ $videogame->copertina_url }}" alt="{{ $videogame->titolo }}" class="mb-2"
                    style="max-width: 100px;">
            @endif
            <input type="file" name="copertina" class="form-control" accept="image/*">
        </div>
        <div class="form-group mb-3">
            <label for="producer_id">Producer</label>
            <select name="producer_id" class="form-control">
                <option value="">-- Select a producer --</option>
                @foreach ($producers as $producer)
                    <option value="{{ $producer->id }}" {{ old('producer_id', $videogame->producer_id) == $producer->id ? 'selected' : '' }}>{{ $producer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="genres">Genres</label>
            <select name="genres[]" class="form-control" multiple>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', $videogame->genres->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection