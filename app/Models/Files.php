<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(Users::class,'user_id','id');
    }
    public function post(){
        return $this->belongsTo(Posts::class,'type_id','id')->where('type','=','posts');
    }
}
