<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activida extends Model
{
    protected $fillable = ['id','nombre','descripcion','id_an','id_us','fecha'];
    use HasFactory;

    public function anciano(){
        return $this->belongsTo('App\Models\anciano','id_an');
    }
    public function responsable(){
        return $this->belongsTo('App\Models\User','id_us');
    }



}
