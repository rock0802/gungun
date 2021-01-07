<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
       'character_name' => 'required'
    );
    public function movies()
    {
        return $this->belongsto('App\Movie');
    }
}
