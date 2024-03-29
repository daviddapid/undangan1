<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    // relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chairs()
    {
        return $this->hasMany(Chair::class);
    }
}
