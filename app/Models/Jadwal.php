<?php
namespace App\Models;

use App\Models\Kursus;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $appends = ['status'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime'   => 'datetime',
    ];

    public function pendaftars()
    {
        return $this->belongsToMany(Pendaftar::class, 'jadwal_pendaftar', 'jadwal_id', 'pendaftar_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    public function getStatusAttribute(): array
    {
        $now = \Carbon\Carbon::now();

        if ($now->lt($this->start_datetime)) {
            return ['label' => 'Upcoming', 'color' => 'primary'];
        } elseif ($now->between($this->start_datetime, $this->end_datetime)) {
            return ['label' => 'Ongoing', 'color' => 'success'];
        } else {
            return ['label' => 'Ended', 'color' => 'secondary'];
        }
    }

}
