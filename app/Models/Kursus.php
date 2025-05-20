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
        'teacher_name',
        'teacher_foto',
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

    /**
     * Interact with the jadwalCount attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function jadwalCountStart(): Attribute
    {
        return Attribute::get(function ($value) {
            return $this->jadwals()->whereDate('start_datetime', '>=', now('Asia/Makassar'))->count();
        });
    }

}
