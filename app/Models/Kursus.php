<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
