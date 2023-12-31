<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'user_id',
        'enrollee_rating'
    ];

}
