<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;



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
        try
        {
            $request->validate([
                'nombre'=> 'required',
                'tipo'=> 'required',
            ]);
    
            Pokemon::create($request->all());
            return redirect()->route('pokemons.index')->with('success', 'Pokemon agregado exitosamente');
        }
        catch (QueryException $e)
        {
            if ($e->errorInfo[1] == 1062) 
            {
                return redirect()->back()->withInput()->withErrors(['nombre' => 'El valor del campo nombre ya existe.']);
            }
        }
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
        return view('edit',['pokemon'=> $pokemon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon): RedirectResponse
    {
        $request->validate([
            'nombre'=> 'required',
            'tipo'=> 'required',
        ]);

        $pokemon->update($request->all());
        return redirect()->route('pokemons.index')->with('success', 'Pokemon editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'Pokemon eliminado exitosamente');
    }
}
