<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion de muchos a muchos
    public function books(){
        return $this->belongsToMany(Book::class);
    }

    //Relacion 1 a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

}
