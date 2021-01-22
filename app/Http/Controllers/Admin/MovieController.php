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
    
    public function insert(Request $request) 
    {
        $this->validate($request, Movie::$rules);
        $movie = new Movie;
        $form = $request->only('title');
        $movie->fill($form);
        $movie->save();
        $movie_last_insert_id = $movie->id;
       
        $characterNames = $request->input('character_name');
        
        /*var_dump($characterNames);
        exit;
        */
        
       foreach ($characterNames as $characterName){
         if ($characterName ==''){
             continue;
         }else{
         $character = new Character;
         $character->character_name = $characterName;
         $character->movies_id = $movie_last_insert_id;
         $character->save();
         }
        }
        
        return redirect('admin/movie/insert');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Movie::where('title', $cond_title)->get();
        } else {
        // それ以外はすべてのニュースを取得する
           $posts = Movie::all();
        }
         return view('admin.movie.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
      // Movie Modelからデータを取得する
      $movie = Movie::find($request->id);
      // Character Model からデータ取得
      $characters = Character::where('movies_id', $request->id )->get()->all();
      
          return view('admin.movie.edit', ['movie' => $movie] ,['characters' => $characters] );
    }


    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, movie::$rules);
      $movie = Movie::find($request->id);
      // 送信されてきたフォームデータを格納する
      $form = $request->only('title');
      // 該当するデータを上書きして保存する
      $movie->fill($form);
      $movie->save();
      
      $characterNames = $request->input('character_name');
      foreach ($characterNames as $characterName){
         $character = new Character;
         $character->character_name = $characterName; 
         $character->save();
      }
      
      return redirect('admin/movie/');
    }

    public function delete(Request $request)
    {
      // 該当するNovie Modelを取得
      $movie = Movie::find($request->id);
      // 削除する
      $movie->delete();
      return redirect('admin/movie/');
    } 
    
}