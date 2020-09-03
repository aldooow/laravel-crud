<h1>Movies</h1>
@foreach ($movies as $movie)
<div class="">
  <h2>Titolo: {{ $movie->title}}</h2>
  <ul>
    {{-- <li><b>Description:</b> <br>
      {{ $movie->description}} </li> --}}
    <li><b>Year:</b> {{ $movie->year}}</li>
    <li><b>Rating:</b> {{ $movie->rating}} </li>
    <li>
      <a href="{{ route('movies.show', $movie->id ) }}">Detagli</a>
    </li>
  </ul>
</div>
@endforeach
