<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(Users::class,'user_id','id');
    }
    public function files(){
        return  $this->hasMany(Files::class,'id','type_id')->where('type','=','posts');
    }
}
