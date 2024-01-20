<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $guarded=["id"];

    public function logKursuses()
    {
        return $this->hasMany(LogKursus::class, 'data_kursus_id', 'data_kursus_id');
    }
}
