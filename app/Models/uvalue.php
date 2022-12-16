<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uvalue extends Model
{
    use HasFactory;
    protected $table = 'uvalue';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uid','tickets','usd'
    ];

}
