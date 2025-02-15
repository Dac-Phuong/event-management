<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    const STATUS_ACTIVE = '1';
    const STATUS_HIDE = '0';
    protected $table = 'project_categories';
    protected $fillable = [
        'name',
        'status',
        'slug'
    ];
    public function project()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
