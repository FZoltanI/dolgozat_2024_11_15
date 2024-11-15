<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    /** @use HasFactory<\Database\Factories\FilmFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "director",
        "year"
    ];

    public function genre(){
        return $this->belongsTo(Genre::class, "genre_id");
    }
}
