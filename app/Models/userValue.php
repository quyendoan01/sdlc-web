<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userValue extends Model
{
    use HasFactory;
    protected $table = 'user_value';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uid','tickets','usd'
    ];
}
