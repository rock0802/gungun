<?php

namespace App\Http\Controllers\Admin;
use App\Character;
use App\Movie;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
    
    public function add()
    {
        return view('admin.movie.insert');
    }
    
    public function register(Request $request) 
    {
        $this->validate($request, Movie::$rules);
        $movie = new Movie;
        $form = $request->only('title');
        $movie->fill($form);
        $movie->save();
        $movie_last_insert_id = $movie->id;
        /*
        $this->validate($request, Character::$rules);
        $character = new Character;
        $form = $request->except('title');
        $character->fill($form);
        $character->movies_id = $movie_last_insert_id;
        $character->save();
        
        foreach ($request->all() as $key => $val){
            if(preg_match('/character/',$key)){
                $character = new Character;
                $character->character_name = $val;
                $character->movies_id = $movie_last_insert_id;
                $character->save();
            }
        }
        */
        $characterNames = $request->input('character_name');
        /*var_dump($characterNames);
        exit;
        */
        
       foreach ($characterNames as $characterName){
         $character = new Character;
         $character->character_name = $characterName;
         $character->movies_id = $movie_last_insert_id;
         $character->save();
        }
        
        return redirect('admin/movie/insert');
    }
    
    public function index()
    {
        return view('admin.movie.index');
    }
    
}