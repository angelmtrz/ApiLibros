<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //habilitar asignacion masiva
    protected $fillable = ['name', 'slug'];

    //Relacion de 1 a muchos (category -> books)
    public function books(){
        return $this->hasMany(Book::class);
    }

}
