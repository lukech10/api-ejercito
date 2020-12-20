<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mision extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = ['updated_at','created_at'];
/*
    public function copies(){
        return $this->hasMany(Copy::class,'book_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'categories_books','books_id','categories_id');
    }*/

}