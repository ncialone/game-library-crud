<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;

    //fillable permite que podamos completar todos los campos en la base de datos a traves del formulario de forma automatica
    //protected $fillable = ['name', 'category_id'];
    
    //guarded permite lo anterior pero EXCLUYE el token que se envía de @csrf a traves del formulario
    protected $guarded = ['token'];
}
