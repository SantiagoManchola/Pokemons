<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function register(Request $request)
    {
        //validar los datos

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        /* return view('pokemons.index', compact('pokemons')); */


       /*  return redirect()->route('pokemons.index'); */
        
        /* return view('index', ['pokemons' => $pokemons]); */
        /* return redirect(route('privada')); */
        /* return view ('index'); */

        /* $pokemons = Pokemon::latest()->paginate(3);
        return view('index', ['pokemons' => $pokemons]); */

        /* Esta si sirve
        return redirect()->action([PokemonsController::class, 'index']); */

        return redirect()->route('pokemons.index');
    }

    public function login(Request $request)
    {
        //Validacion

        $credentials=
        [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('pokemons.index'));
        }
        else
        {
            return redirect('login');
        }
        
    }
    public function logout(Request $request)
    {
        
    }
}
