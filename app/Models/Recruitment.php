<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $table = "recruitments";
    protected $fillable = [
        "title",
        "content",
        "description",
        "author_id",
        "thumbnail",
        'slug',
        'views',
        'status',
        'url',
        'number',
        'expired_at',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
