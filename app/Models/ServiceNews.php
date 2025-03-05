<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceNews extends Model
{
    use HasFactory;

    protected $table = 'service_news';

    protected $fillable = [
        'service_id',
        'news_id',
    ];
}
