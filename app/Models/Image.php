<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function post(){
        return $this->belongsTo(Models\Post::class);
    }
}
