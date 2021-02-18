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
    
    public function Character()
    {
        return $this->belongsToMany('App\Character')->withTimestamps();
    }
}
