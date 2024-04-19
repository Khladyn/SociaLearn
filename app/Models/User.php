<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'affiliation',
        'birthday',
        'gender',
        'profile_picture',
        'email',
        'password',
    ];

    public static function validationRules($currentStep)
    {
        $rules = [];
    
        if ($currentStep === 1) {
            $rules = [
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'address' => 'required|string|max:255',
                'affiliation' => 'required|string|max:255',
                'birthday' => 'required|date',
                'gender' => 'required|string|in:Male,Female,Prefer not to say',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ];
        } else {
            $rules = array_merge($rules, [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users'),
                ],
                'password' => 'required|string|min:8|max:255',
                'confirm_email' => 'required|email|same:email',
                'confirm_password' => 'required|string|min:8|max:255|same:password',
            ]);
        }
    
        return $rules;
    }

    public function createdCourses()
    {
        return $this->hasMany(Course::class, 'created_by', 'id');
    }

    public function sentChatMessages()
    {
        return $this->hasMany(ChatMessage::class, 'sender_id', 'id');
    }

    public function receivedChatMessages()
    {
        return $this->hasMany(ChatMessage::class, 'recipient_id', 'id');
    }
    
}
