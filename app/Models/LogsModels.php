<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogsModels extends Model
{
    protected $table = 'logs';
    protected $fillable = ['user_id', 'action', 'description', 'data'];
}
