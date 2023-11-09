<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //foreign key
            $table->integer('course_id'); //foreign key
            $table->string('topic_header');
            $table->string('topic_body');
            $table->integer('topic_reply_count');
            $table->integer('topic_upvote_count');
            $table->integer('topic_downvote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
