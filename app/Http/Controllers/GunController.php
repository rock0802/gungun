<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Storage;
use App\Gun;
use App\Movie;
use App\Character;
use DB;

class GunController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
             $posts = Gun::orderBy('gunName', 'asc')->where('gunName', 'like', '%' . $cond_title . '%')->paginate(10);
      } else {
             $posts = Gun::orderBy('gunName', 'asc')->paginate(10);
      }
        return view('gun.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function detail(Request $request)
    {
        $characters = Gun::find($request->id)->characters;
        //配列を宣言
        $movies = [];
        
        foreach ($characters as $character) {
            $movies[$character->movie->id]['title'] = $character->movie->title;
            $movies[$character->movie->id]['characters'][] = $character;     
           
        }
        /*var_dump($movies);
        exit;
        /*var_dump($characters->toArray());
        exit;*/
       
        $gun = Gun::find($request->id);
       
       
        return view('gun.detail', compact('gun','movies','characters'));
    }
}
