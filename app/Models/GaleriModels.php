<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriModels extends Model
{
    protected $table = 'galeri';
    protected $fillable = ['img', 'deskripsi'];
}
