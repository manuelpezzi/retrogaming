<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Producer;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames=Videogame::all();
        return view("videogames.index",compact("videogames"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $producers= Producer::all();
       $genres= Genre::all();
       return view('videogames.create',compact('producers','genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $request->all();

        $newVideogame = new Videogame();
        $newVideogame->titolo = $data['titolo'];
        $newVideogame->anno = $data['anno'];
        $newVideogame->description = $data['description'] ?? null;
        $newVideogame->producer_id = $data['producer_id'];

        // Gestione dell'immagine di copertina
        if (array_key_exists('copertina', $data) && $request->hasFile('copertina')) {
            $img_url = Storage::putFile('covers', $data['copertina'], 'public');
            $newVideogame->copertina = $img_url;
        }

        $newVideogame->save();

        // Sincronizza i generi
        if (array_key_exists('genres', $data)) {
            $newVideogame->genres()->attach($data['genres']);
        }

        return redirect()->route('videogames.show', $newVideogame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view('videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $producers = Producer::all();
        $genres= Genre::all();
        
        return view('videogames.edit', compact('videogame','producers','genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        $videogame->titolo = $data['titolo'];
        $videogame->anno = $data['anno'];
        $videogame->description = $data['description']?? null;
        $videogame->producer_id = $data['producer_id'];

         // Gestione dell'immagine di copertina
        if (array_key_exists('copertina', $data) && $request->hasFile('copertina')) {
            // Elimina l'immagine precedente, se esiste
            if ($videogame->copertina) {
                Storage::disk('public')->delete($videogame->copertina);
            }

            // Carica la nuova immagine
            $img_url = Storage::putFile('covers', $data['copertina'], 'public');
            $videogame->copertina = $img_url;
        }

        $videogame->save();

        // Sincronizza i generi
        if (array_key_exists('genres', $data)) {
            $videogame->genres()->sync($data['genres']);
        } else {
            $videogame->genres()->detach();
        }

        return redirect()->route('videogames.show', $videogame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        // Elimina l'immagine, se esiste
        if ($videogame->copertina) {
            Storage::disk('public')->delete($videogame->copertina);
        }

        // Rimuovi tutte le associazioni nella tabella pivot genres_videogames
        $videogame->genres()->detach();

        // Elimina il videogioco
        $videogame->delete();

        return redirect()->route('videogames.index');
    }
}
