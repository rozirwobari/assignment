<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSettingModels extends Model
{
    protected $table = 'website_settings';
    protected $fillable = ['name', 'deskripsi', 'favicon', 'img', 'visi', 'misi', 'sejarah', 'logo'];
}
