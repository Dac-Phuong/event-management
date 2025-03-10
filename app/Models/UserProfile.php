<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profiles";
    protected $fillable = [
        "user_id",
        "category_id",
        "avatar",
        "education",
        "experience",
        'philosophy',
        "content",
        "position",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(UserCategory::class, 'category_id');
    }
}
