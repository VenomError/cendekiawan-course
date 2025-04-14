<?php

namespace App\Models;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    /** @use HasFactory<\Database\Factories\KursusFactory> */
    use HasFactory;

    protected $withCount = [
        'pendaftar'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'description',
        'hour_duration',
        'price',
    ];

    public function pendaftar()
    {
        return $this->belongsToMany(Pendaftar::class, 'kursus_pendaftar');
    }

}
