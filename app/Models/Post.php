<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'uid', 'category_id','title','author','image','description'
    ];
    // protected $fillable = array('uid', 'category_id','title','author','image','description');
    // Public function category(){
    //     return $this->belongsTo('category');
    // }
}
