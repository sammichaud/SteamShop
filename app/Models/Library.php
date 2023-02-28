<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = ['user_id', 'game_id'];
    protected $primaryKey = ['user_id', 'game_id'];
    public $incrementing = false;
}
