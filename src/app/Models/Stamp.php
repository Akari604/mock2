<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'stamp_date',
        'start_work',
        'end_work',
        'total_rest',
        'total_work',
    ];

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }
}
