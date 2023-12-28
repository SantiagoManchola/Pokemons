<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pokemons = Pokemon::latest()->paginate(3);
        return view('index', ['pokemons' => $pokemons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre'=> 'required',
            'tipo'=> 'required',
        ]);

        Pokemon::create($request->all());
        return redirect()->route('pokemons.index')->with('success', 'Nueva tarea creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
