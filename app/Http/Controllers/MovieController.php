<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::all();
      // dd($movies);
      return view('movies.index', compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidation());

        $request_data = $request->all();
        // dd($request_data);

        $new_movie = new Movie();
        // $new_movie->title = $request_data['title'];
        // $new_movie->year = $request_data['year'];
        // $new_movie->description = $request_data['description'];
        // $new_movie->rating = $request_data['rating'];
        //   Se tutte le parti sono fatti bene e scritte come i nomi nel form,
        //   possiamo uttilizzare questo --> $new_movie->fill($request_data).
        $new_movie->fill($request_data);

        $saved = $new_movie->save();

        if($saved){
          // $saved_movie = Movie::orderBy('id','asc')->last();
          $saved_movie = Movie::orderBy('id','desc')->first();

          return redirect()->route('movies.show', $saved_movie);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        // dd($movies);
        if(empty($movie)){
          abort(404);
        }
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
      $request->validate($this->getValidation());

      $data = $request->all();
      $movie->update($data);
      // dd($movies);
      return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index');

    }

    // FUNZIONI:

    protected function getValidation(){
      return [
        'title' => 'required|max:255',
        'year' => 'required|integer|min:1895|max:2020',
        'description' => 'required',
        'rating' => 'required|integer|min:1|max:10'
      ];
    }
}
