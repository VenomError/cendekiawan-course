<?php
namespace App\Models;

use App\Models\Kursus;
use App\Models\Pendaftar;
use App\Enum\PembayaranStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'status'       => PembayaranStatus::class,
    ];
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    /**
     * Interact with the receiptUrl attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function receiptUrl(): Attribute
    {
        return Attribute::get(function ($value) {
            return asset(Storage::url($this->receipt));
        });
    }
}
