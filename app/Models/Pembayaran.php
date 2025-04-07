<?php

namespace App\Models;

use App\Models\Pendaftar;
use App\Enum\PembayaranStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'pendaftar_id',
        'kursus_id',
        'amount',
        'status',
        'receipt',
        'payment_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'payment_date' => 'datetime',
        'status' => PembayaranStatus::class
    ];
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
