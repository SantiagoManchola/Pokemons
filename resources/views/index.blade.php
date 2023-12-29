@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">POKEMONS</h2>
        </div>
        <div>
            <a href="{{route('pokemons.create')}}" class="btn btn-primary">Añadir Pokemon</a>
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
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            @foreach ($pokemons as $pokemon)
                <tr>
                    <td>{{$pokemon->nombre}}</td>
                    <td>
                        {{$pokemon->tipo}}
                    </td>
                    <td>
                        <span class="badge bg-warning fs-6">{{$pokemon->status}}</span>
                    </td>
                    <td>
                        <form action="{{route('pokemons.edit', $pokemon)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>

                        <form action="{{route('pokemons.destroy', $pokemon)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </table>
        {{$pokemons->links()}}
    </div>
</div>
@endsection