<h1>Movies</h1>

<a href="{{ route('movies.create') }}">Create new Movie</a>

@foreach ($movies as $movie)
<div>
  <h2>Titolo: {{ $movie->title}}</h2>

    <b>Rating:</b> {{ $movie->rating}} |

    <a href="{{ route('movies.show', $movie->id ) }}">Detagli</a> |

    <a href="{{ route('movies.edit', $movie->id ) }}">Modifica</a> |

    <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
      @csrf
      @method('DELETE')

      <input type="submit"value="Elimina">
    </form>



</div>
@endforeach
