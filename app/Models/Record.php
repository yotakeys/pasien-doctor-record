<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'doctor_id',
        'kondisi',
        'suhu',
        'resep_url'
    ];
}
