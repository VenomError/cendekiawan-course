<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetValueByKey($query, $key)
    {
        return $query->where('key', $key)->first()->value('value');
    }
}
