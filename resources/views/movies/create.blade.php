<h1>Crea un Nuovo Movies</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('movies.store') }}" method="post">
 @csrf {{-- @csrf : Crea una TOKEN Usa e Getta, per la sciurezza --}}
 @method('POST') {{-- oppure <input name="_method" type="hidden" value="POST"> --}}

 <div>
   <label>Title</label>
   <input type="text" name="title" value="{{ old('title') }}">
 </div>

 <div>
   <label>Year</label>
   <input type="text" name="year" value="{{ old('year') }}">
 </div>

 <div>
   <label>Description</label>
   <textarea name="description" row="8" cols="80">
     {{ old('description') }}
   </textarea>
 </div>

 <div>
   <label>Rating</label>
   <input type="text" name="rating"  value="{{ old('rating') }}">
 </div>

 <div>
   <input type="submit" value="Save">
 </div>
</form>
