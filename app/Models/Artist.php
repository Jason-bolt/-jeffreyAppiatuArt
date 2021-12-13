<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    protected $primaryKey = 'id';

    protected $fillable = ['artist_image', 'artist_about'];

    public $timestamps = false;

}
