<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
// use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class MovieController extends Controller
{
    //
    public function index(Request $request){
        $title = $request->get('title', '');
        $moviesFiltered = Movie::search($title);

        // $moviesFiltered = Movie::query();
        // $perPage = $request->get('take', '');
        // $skip = $request->get('skip', null);
        $take = $request->get('take', 0);
        // $orderBy = $request->get('orderBy',null);
        // $orderDirection = $request->get('orderDirection', 'desc');

        // $moviesQuery = Movie::query();
        // $moviesQuery->where('title', 'like', '%' . $title . '%');
        // // $moviesQuery->orderBy($orderBy, $orderDirection);
        // $moviesQuery->skip($skip)->take($take);
        $movies = $moviesFiltered->paginate($take);
        return response()->json($movies);











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
