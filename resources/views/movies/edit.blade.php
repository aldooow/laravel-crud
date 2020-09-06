<h1>Modifica Movie: {{$movie->title}}</h1>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div>
  <form action="{{ route('movies.update', $movie->id) }}" method="post">
    @csrf
    @method('PUT')

    <div>
      <label>Title</label>
      <input type="text" name="title" value="{{ $movie->title }}">
    </div>

    <div>
      <label>Year</label>
      <input type="text" name="year" value="{{ $movie->year }}">
    </div>

    <div>
      <label>Description</label>
      <textarea name="description" row="8" cols="80">
        {{ $movie->description }}
      </textarea>
    </div>

    <div>
      <label>Rating</label>
      <input type="text" name="rating"  value="{{ $movie->rating }}">
    </div>

    <div>
      <input type="submit" value="Save">
    </div>

  </form>

</div>
