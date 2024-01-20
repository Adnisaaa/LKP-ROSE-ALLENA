<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backdrop extends Model
{
    use HasFactory;
    
    protected $guarded=["id"];

    public function logBackdrops()
    {
        return $this->hasMany(LogBackdrop::class, 'backdrop_id', 'backdrop_id');
    }
}
