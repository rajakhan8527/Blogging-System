<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    //
    protected $table = 'blogusers';
    protected $fillable=[
        'name', 'email', 'password', 'profile_pic','no_of_post'
    ];
}
