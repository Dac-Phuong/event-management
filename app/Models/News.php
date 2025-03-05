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
        "new_category_id",
        "description",
        "thumbnail",
        "views",
        "is_show",
        "is_pin",
        "is_gallery",
        "is_certification",
        'author_id',
        'slug',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'new_category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_news');
    }
}
