<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    use HasFactory;

    //Relación 1 a 1
    public function libro()
    {
        return $this->belongsTo('App\Models\Libro');
    }
}
