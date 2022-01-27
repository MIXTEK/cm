<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }


   // Mutator before it gets to DB we modify add path then pesist to column name
    public function setPostImageAttribute($value){

        $this->attributes['post_image'] = asset($value);

    }

    public function getPostImageAttribute($value){
        return asset('storage/' . $value);
    }

}
