
<h1>Prova</h1>
<h2>Titolo: {{ $movie->title}}</h2>
<ul>
  <li><b>Description:</b> <br>
    {{ $movie->description}} </li>
  <li><b>Year:</b> {{ $movie->year}}</li>
  <li><b>Rating:</b> {{ $movie->rating}} </li>
  <li>
    <a href="{{ route('movies.index') }}">Indietro</a>
  </li>
</ul>
