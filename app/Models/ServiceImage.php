<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;
    protected $table = "service_images";
    protected $fillable = [
        "service_id",
        "image",
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
