<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movie::all();
        return response()->json($movies);
    }
    public function show($id) {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);

    }
    public function store(Request $request){
        $movie = $request;
        // dd($movie['title']);

        Movie::create([
            'title' => $movie['title'],
            "director" => $movie['director'],
            "image_url" => $movie['image_url'],
            "duration" => $movie['duration'],
            "release_date" => $movie['release_date'],
            "genre" => $movie['genre'],

        ]);
        return $movie;
    }
    public function update(Request $request, $id){

        $movie = Movie::findOrFail($id);

        $movie->update([
            'title' => $request['title'],
            "director" => $request['director'],
            "image_url" => $request['image_url'],
            "duration" => $request['duration'],
            "release_date" => $request['release_date'],
            "genre" => $request['genre'],
        ]);
        return $movie;


    }
    public function destroy($id){
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return $movie;
    }
}
