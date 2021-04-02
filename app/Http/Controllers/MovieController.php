<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Gun;
use App\Character;
use DB;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if($cond_title != '') {
            $posts = Movie::where('title', 'like', '%' . $cond_title . '%')->paginate(10);
        } else {
            $posts = Movie::paginate(10);
        }
        return view ('movie.index', compact('posts','cond_title'));
    }
    
    public function detail(Request $request)
    {
        $movie = Movie::find($request->id);
        $characters = Character::where('movies_id', $request->id )->get()->all();
        
        
        return view('movie.detail',compact('movie', 'characters'));
    }
}
