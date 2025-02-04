<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $fillable = [
        "title",
        "content",
        "is_show",
        "is_pin",
        "new_category_id",
        "thumbnail",
        "views",
        'author_id'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'new_category_id');
    }
}
