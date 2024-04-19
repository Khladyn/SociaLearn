<?php

// app/Course.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'level', 'image_header', 'created_by',
    ];

    public static function validationRules($id = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category' => 'required|string',
            'level' => 'required|string',
            'image_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];

        if ($id) {
            // If updating, unique rule for title excluding the current record
            $rules['title'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('courses')->ignore($id),
            ];
        } else {
            // If creating, unique rule for title
            $rules['title'] = 'required|string|max:255|unique:courses';
        }

        return $rules;
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}




