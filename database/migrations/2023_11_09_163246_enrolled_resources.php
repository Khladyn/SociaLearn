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
        Schema::create('enrolled_resources', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //foreign key
            $table->integer('course_id'); //foreign key
            $table->integer('is_done');
            $table->integer('is_offline');
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
