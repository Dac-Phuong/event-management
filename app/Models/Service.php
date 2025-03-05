<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
        "name",
        "status",
        "content",
        "url",
        "thumbnail",
        "description",
        'slug',
    ];
    public function newsMany()
    {
        return $this->belongsToMany(News::class, 'service_news');
    }
}
