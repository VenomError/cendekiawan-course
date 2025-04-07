<?php

namespace App\Models;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'pendaftar_id',
        'kursus_id',
        'start_datetime',
        'end_datetime',
        'location',
        'quota',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
