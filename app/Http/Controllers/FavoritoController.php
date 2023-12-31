<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Auth::user()->email;
        $pokemons = Favorito::where('email','=',$email)->get();
        return view('index', ['pokemons' => $pokemons]);
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
        $favorito = new Favorito();
        $favorito->id_pokemon = $request->id_pokemon;
        $favorito->email = $request->email;
        $favorito->save();
        return redirect()->back();
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
        //
    }
}
