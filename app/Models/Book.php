<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const DISPONIBLE = 1;
    const AGOTADO = 0;

    //Relacion de 1 a muchos inversa (books -> user)
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion de muchos a muchos
    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    //Relacion 1 a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

}
