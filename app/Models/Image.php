<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //relacion Polimorfica
    /*
     * para una relacion polimorfica necesitas llamar la funcion tal cual en el campo
     * se declara el parametro morphTo()
     *
     * */

    protected $fillable = [
        'url'
    ];

    public function imageable(){
        return $this->mortphTo();
    }
}
