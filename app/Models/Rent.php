<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    /** @use HasFactory<\Database\Factories\RentFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
    ];

    public function film(){
        return $this->belongsTo(Film::class, "film_id");
    }
}
