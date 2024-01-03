@foreach ($pokemones as $pokemone)
    @if ($pokemone->id_pokemon == $pokemon->id && $pokemone->favorito == 'SI')
        <p>Si Fav</p>
    @else
        <p>No fav</p>
    @endif
@endforeach