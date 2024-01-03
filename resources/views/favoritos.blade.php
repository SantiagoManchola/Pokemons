@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h1>Usuario: @auth {{Auth::user()->name}} @endauth</h1>
        </div>
        <div>
            <h1 class="text-white">Mis Favoritos</h1>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}<br>
        </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Pokemon</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>

            @foreach ($pokemones as $pokemone)
                <tr>
                    {{-- <td>{{$pokemon->nombre}}</td> --}}
                    <td>
                        {{$pokemone->nombre}}
                    </td>
                    <td>
                        {{$pokemone->favorito}}
                    </td>

                    </form>
                    <td>
                        <form action="{{route('pokemones.destroy', $pokemone)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar de Favoritos</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </table>
       {{--  {{$pokemons->links()}} --}}
    </div>
    <footer>
        <a href="{{route('logout')}}">
            <button type="button" class="btn btn-outline-primary me-2"> 
                Cerrar Sesion
            </button>
        </a>
    </footer>
</div>
@endsection