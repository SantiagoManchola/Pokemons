<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Auth::user()->email;
        /* $favoritos = Favorito::where('email','=',$email)->get(); */
        $id_pokemon= Favorito::select('id_pokemon')->where('email','=',$email)->distinct()->get()->pluck('id_pokemon')->toArray();
        $pokemones = Pokemon::whereIn('id', $id_pokemon)->get();
        return view('favoritos', ['pokemones' => $pokemones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $favorito = Favorito::where('email', $request->email)
            ->where('id_pokemon', $request->id_pokemon)
            ->first();
            if($favorito == null)
            {
                $favorito = new Favorito();
                $favorito->id_pokemon = $request->id_pokemon;
                $favorito->email = $request->email;
                $favorito->save();
                return redirect() -> route('favoritos.index')->with('success', 'Agregado exitosamente');
            }
            else
            {
                return redirect()->route('pokemons.index')->with('success', 'Ya se encuenta agregado en la lista de favoritos');
            }
    }
        

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorito $favorito)
    {
        $favorito->delete();
        return redirect()->back()->with('success', 'Pokemon eliminado de favoritos exitosamente');
    }
}
