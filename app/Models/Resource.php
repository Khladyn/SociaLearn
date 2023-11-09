<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'resource_name',
        'resource_type',
        'resource_points',
        'resource_views'
    ];
}
