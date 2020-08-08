<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    protected $table = 'profile';
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
}
