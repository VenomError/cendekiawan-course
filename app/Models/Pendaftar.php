<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Pembayaran;
use App\Enum\PendaftarStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftar extends Model
{
    /** @use HasFactory<\Database\Factories\PendaftarFactory> */
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        "user_id",
        "phone",
        "institute",
        "pekerjaan",
        "jabatan",
        "status",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => PendaftarStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kursuses()
    {
        return $this->hasMany(Kursus::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
