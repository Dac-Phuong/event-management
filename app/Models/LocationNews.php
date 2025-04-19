<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationNews extends Model
{
    use HasFactory;
    protected $fillable = [
        "location_map_id",
        "news_id",
    ];
    public function news()
    {
        return $this->hasMany(News::class, 'id', 'news_id');
    }
    public function location()
    {
        return $this->hasMany(LocationMap::class, 'id', 'location_map_id');
    }
}
