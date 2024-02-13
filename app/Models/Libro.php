<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    //Relación 1 a 1 
    public function resenya()
    {
        return $this->hasOne('App\Models\Resenya');
    }

    //Relación 1 a muchos (inversa)
    public function editorial()
    {
        return $this->belongsTo('App\Models\Editoriale');
    }

    //Relación muchos a muchos
    public function autores()
    {
        return $this->belongsToMany('App\Models\Autore');
    }
}

