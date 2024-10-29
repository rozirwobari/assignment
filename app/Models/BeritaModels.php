<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaModels extends Model
{
    protected $table = 'berita';
    protected $fillable = ['judul', 'deskripsi', 'kategori'];
}
