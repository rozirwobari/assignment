<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakModels extends Model
{
    protected $table = 'kontak';
    protected $fillable = ['telepon', 'whatsapp', 'alamat', 'email', 'maps'];
}
