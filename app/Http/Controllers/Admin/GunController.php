<?php

namespace App\Http\Controllers\Admin;

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
    public function add()
    {
        return view('admin.gun.insert');
    }
    
    public function insert(Request $request)
    {
        $this->validate($request, Gun::$rules);
        $gun = new Gun;
        $form = $request->all();
        if(isset($form['image'])){
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $gun->image_path = Storage::disk('s3')->url($path);
        }else{
            $gun->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
        $gun->fill($form);
        $gun->save();
        
        return redirect('admin/gun/insert');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
             $posts = Gun::orderBy('gunName', 'asc')->where('gunName', 'like', '%' . $cond_title . '%')->paginate(10);
      } else {
             $posts = Gun::orderBy('gunName', 'asc')->paginate(10);
      }
        return view('admin.gun.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
      // Gun Modelからデータを取得する
      $gun = Gun::find($request->id);
      return view('admin.gun.edit', ['gun_form' => $gun]);
    }
    
    public function update(Request $request)
    {
       $this->validate($request,Gun::$rules);
       $gun = Gun::find($request->id);
       $gun_form = $request->all();
       if($request->remove == 'true'){
           $gun_form['image_path'] = null;
       }elseif ($request->file('image')){
           $path = Storage::disk('s3')->putFile('/',$gun_form['image'],'public');
           $gun->image_path = Storage::disk('s3')->url($path);
       }else{
           $gun_form['image_path'] = $gun->image_path;
       }
       unset($gun_form['_token']);
       unset($gun_form['image']);
       unset($gun_form['remove']);
        // 該当するデータを上書きして保存する
        $gun->fill($gun_form)->save();
       
       return redirect('admin/gun/');
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
       
       
        return view('admin.gun.detail', compact('gun','movies','characters'));
    }
    
     public function show($id)
    {
    $gun = Gun::find($id);
    return view('admin.gun.show', compact('gun'));
    }
}
