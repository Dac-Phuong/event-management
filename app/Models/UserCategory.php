<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;

    protected $table = 'user_categories';

    protected $fillable = [
        'name',
        'status',
        'is_pin',
        'description',
    ];

    public function userProfile()
    {
        return $this->hasMany(UserProfile::class, 'category_id', 'id');
    }
}

