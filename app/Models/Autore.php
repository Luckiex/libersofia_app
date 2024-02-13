<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'nacionalidad'];

    //Relación muchos a muchos
    public function libros()
    {
        return $this->belongsToMany('App\Models\Libro');
    }
}
