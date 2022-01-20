<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anciano extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','cedula','direccion','contacto','num_secuencia'];
    public function actividad(){
        return $this->hasMany('App\Models\activida');
    }

}
