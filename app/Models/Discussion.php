<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'replied_discussion_id', //nullable
        'topic_header', //nullable
        'topic_body',
        'topic_reply_count',
        'topic_upvote_count',
        'topic_downvote_count',
    ];
}
