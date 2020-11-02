<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
class MovieController extends Controller
{
    //
    public function index(Request $request){
        // dd($title);
        // $movie = new Movie;
        // $sta = Movie::where('title', $title)->get();
        $title = $request->get('title', '');

            $moviesFiletered = Movie::search($title);
            return response()->json($moviesFiletered);








    }
    public function show($id) {

        $movie = Movie::findOrFail($id);
        return response()->json($movie);

    }
    public function store(CreateMovieRequest $request){

        $movie = $request->validated();
        Movie::create($movie);
        return $movie;

    }
    public function update(UpdateMovieRequest $request, $id){

        $movie = Movie::findOrFail($id);
        $movie->update($request->validated());
        return $movie;

    }
    public function destroy($id){

        $movie = Movie::findOrFail($id);
        $movie->delete();
        return $movie;

    }
}
