<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Storage;
use App\Gun;

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
          $posts = Gun::where('gunName', $cond_title)->get();
      } else {
          $posts = Gun::all();
      }
      return view('admin.gun.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function edit(Request $request)
  {
      // Gun Modelからデータを取得する
      $gun = Gun::find($request->id);
      return view('admin.gun.edit', ['gun_form' => $gun]);
  }
    
    
}
