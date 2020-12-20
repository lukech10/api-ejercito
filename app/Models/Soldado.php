<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soldado extends Model
{
    use HasFactory;

    protected $primaryKey = 'NumeroPlaca';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $hidden = ['updated_at','created_at'];
/*
    public function copies(){
        return $this->hasMany(Copy::class,'book_id');
    }
*/
    public function equipos(){
        return $this->belongsTo(Equipo::class,'equipos-soldados','NumeroPlaca','equipo_id');
    }

}