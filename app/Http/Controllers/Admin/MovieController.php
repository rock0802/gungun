<?php

namespace App\Http\Controllers\Admin;
use App\Character;
use App\Movie;
use App\Gun;
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
            $posts = Movie::where('title', 'like', '%' . $cond_title . '%')->paginate(10);
        } else {
        // それ以外はすべてのニュースを取得する
           $posts = Movie::paginate(10);
        }
         return view('admin.movie.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // Movie Modelからデータを取得する
        $movie = Movie::find($request->id);
        // Character Model からデータ取得
        $characters = Character::where('movies_id', $request->id )->get()->all();
        
        return view('admin.movie.edit', ['movie' => $movie] ,['characters' => $characters]);
    }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, movie::$rules);
      $movie = Movie::find($request->id);
      $movie->title = $request->title;
      //$form = $request->all();
      //$movie->fill($form);
      $movie->save();
      $characterNames = $request->input('character_name');
      $characterIds = $request->input('character_id');
      
      foreach ($characterNames as $k => $characterName){
         if ($characterName ==''){
             continue;
         }else {
             //var_dump($characterIds[$k]);
             \Log::debug($characterIds[$k]);
             //if($characterIds[$k] !== ''){
            if(isset($characterIds[$k])){
                 $character = Character::find($characterIds[$k]);
                 $character->character_name = $characterName;
                 $character->save();
             }else {
                 $character = new Character;
                 $character->character_name = $characterName;
                 $character->movies_id = $request->id;
                 $character->save();
             }
         
         }
        }
      
      return redirect('admin/movie/');
    }

    public function delete(Request $request)
    {
        Character::where('movies_id', $request->id)->delete();
      /*\Log::debug($characterIds[$k]);
      if(isset($characterIds[$k])){
                 $character = Character::find($characterIds[$k]);
                 $character->delete();
             }*/
      // 該当するNovie Modelを取得
      $movie = Movie::find($request->id);
      // 削除する
      $movie->delete();
      
      
      
      return redirect('admin/movie/');
    } 
    
    public function detail(Request $request)
    {
        $movie = Movie::find($request->id);
        $characters = Character::where('movies_id', $request->id )->get()->all();
        
        
        return view('admin.movie.detail',compact('movie', 'characters'));
    }
    
    public function register(Request $request)
    {
        $guns = Gun::orderBy('gunName', 'asc')->get();;
        $character = Character::find($request->id);

        return view('admin.character.register',compact('character','guns')); 
    }
    public function associate(Request $request)
    {
        $character = Character::find($request->id);

        $gunIds = $request->option('gun->id');
        foreach ($gunIds as $gunId){
         if ($gunId ==''){
             continue;
         }else {
             $character_gun->gun_id = $gunId;
             $character_gun->character_id = $character_id;
             $character_gun->save();
            }    
        }
        $character_gun->save();
    }
    
    public function store(Request $request)
    {
        $character = Character::find($request->input('character_id'));
        $gunIdParams = $request->input('gun_id');
        // var_dump($gunIdParams);
        //exit;
        $gunIds = [];
        foreach($gunIdParams as $gunId) {
        if (!empty($gunId)) {
              $gunIds[] = $gunId;
            }
       }
        $character->guns()->detach();
        $character->guns()->attach($gunIds);
        //var_dump($character->movies_id);
        //exit;
        
        return redirect('/admin/movie/detail?id=' .$character->movies_id);
    }
    public function show($id)
    {
        
    }
    public function change($id)
    {
        $character = character::find($id);
        $guns = $character->guns->pluck('id')->toArray();
        $gunList = Gun::all();
        return view('admin.character.change', compact('character', 'guns', 'gunList'));
    }
    public function fix(Request $request, $id)
    {
        $fix = [
            'character_name' => $request->character_name,
        ];
        Character::where('id', $id)->fix($fix);
        $character = Book::find($id);
        $character->guns()->sync(request()->guns);
        return back()->with('success', '編集完了しました');
    }
    public function destroy($id){
        $character = Character::find($id);
        $character->delete();
        $character->guns()->detach();
        return view('admin.movie.detail')->with('success', '削除完了しました');
    }
}