<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\UserRole;
use App\Models\Jadwal;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'role'     => UserRole::class,
        ];
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftar::class);
    }
    public function getJadwalsAttribute()
    {
        return $this->pendaftaran->map(function ($pendaftar) {
            return $pendaftar->jadwal;
        })->filter(); 
    }

    public function scopePimpinans($query)
    {
        return $query->role(UserRole::PIMPINAN);
    }
    public function scopeAdmins($query)
    {
        return $query->role(UserRole::ADMIN);
    }

    public function scopePesertas($query)
    {
        return $query->role(UserRole::PESERTA);
    }

}
