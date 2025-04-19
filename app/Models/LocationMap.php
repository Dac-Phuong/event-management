<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationMap extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "lat",
        "lng",
        "address",
    ];
    public function locationNews()
    {
        return $this->hasMany(LocationNews::class, 'location_map_id', 'id');
    }
}
