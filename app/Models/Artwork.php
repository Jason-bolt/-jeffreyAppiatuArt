<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $table = 'artworks';

    protected $primaryKey = 'id';

    protected $fillable = ['artwork_name', 'artwork_image'];


}
