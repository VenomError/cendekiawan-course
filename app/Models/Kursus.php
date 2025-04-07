<?php

namespace App\Models;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    /** @use HasFactory<\Database\Factories\KursusFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'pendaftar_id',
        'name',
        'description',
        'duration',
        'price',
        'is_available',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
