<?php
namespace App\Models;

use App\Models\Jadwal;
use App\Models\Pendaftar;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    /** @use HasFactory<\Database\Factories\KursusFactory> */
    use HasFactory, Sluggable;

    protected $withCount = [
        'pendaftars',
        'jadwals',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'hour_duration',
        'price',
        'thumbnail',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function pendaftars()
    {
        return $this->belongsToMany(Pendaftar::class, 'kursus_pendaftar');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

}
