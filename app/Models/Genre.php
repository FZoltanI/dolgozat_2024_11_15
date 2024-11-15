<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
    ];

    public function films(){
        return $this->hasMany(Film::class, 'genre_id');
    }
}
