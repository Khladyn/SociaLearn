<?php

// app/Models/Resource.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'type',
        'title',
        'content',
        'file_path',
        'thumbnail_path',
        'views',
        'points',
        'course_id',
        'user_id',
    ];

    public static function validationRules($id = null)
    {
        return [
            'type' => 'required|string',
            'title' => 'required|string|max:255|unique:resources,title,' . $id,
            'content' => 'nullable|string',
            'thumbnail_file' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'resource_file' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,mp4,mov,mp3|max:20480',
            'views' => 'nullable|integer|min:0',
            'points' => 'nullable|integer|min:0',
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


