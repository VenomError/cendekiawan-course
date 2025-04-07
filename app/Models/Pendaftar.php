<?php

namespace App\Models;

use App\Enum\PendaftarStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
