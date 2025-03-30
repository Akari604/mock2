<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'status',
        'stamp_date',
        'start_work',
        'end_work',
        'total_rest',
        'total_work',
    ];
}
