<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\emptyArray;


class Movie extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function search($title){

            $movies = Movie::where('title', 'like', '%'. $title .'%')->get();
            if($movies->isEmpty()){
                return Movie::query();
            } else {
                return Movie::query('title', 'like', '%'. $title .'%');
            }

        }

}
