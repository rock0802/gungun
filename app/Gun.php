<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'gunName' => 'required',
        'body' => 'required',
    );
    
    public function characters()
    {
         return $this->belongsToMany('App\Character', 'character_gun')->withTimestamps();
    }
   
    
   /* public static function selectlist()
    {
        $guns = Gun::all();
        $list = array();
        $list += array("" => "選択しろ！");//selectlistの先頭を空に
        foreach ($guns as $gun) {
            $list += array($gun->gunName => $gun->gunName);
        }
        return $list;
    }*/
}
