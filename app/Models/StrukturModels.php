<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturModels extends Model
{
    protected $table = 'struktur';
    protected $fillable = ['pid', 'nama', 'title', 'image'];
}
