<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = array('id');
    
    
    public static $rules = array(
        'title' => 'required',
    );
    public function characters()
    {
        return $this->hasMany('App\Character');
    }
}
