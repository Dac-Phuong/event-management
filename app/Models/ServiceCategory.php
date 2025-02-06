<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    const STATUS_ACTIVE = '1';
    const STATUS_HIDE = '0';
    protected $table = 'service_categories';
    protected $fillable = [
        'name',
        'status',
        'slug'
    ];
    public function service()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
