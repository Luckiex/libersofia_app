<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editoriale extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ubicacion'];

    //Relación 1 a muchos
    public function libros()
    {
        return $this->hasMany('App\Models\Libro');
    }
}
