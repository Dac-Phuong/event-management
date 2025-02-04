<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = '1';
    const STATUS_HIDE = '0';
    protected $table = 'news_categories';
    protected $fillable = [
        'name',
        'status',
        'slug'
    ];
    public function news()
    {
        return $this->hasMany(News::class, 'new_category_id', 'id');
    }
}
