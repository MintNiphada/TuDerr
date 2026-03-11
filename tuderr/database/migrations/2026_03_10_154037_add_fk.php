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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('payment_approveds', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['teacher_id']);
        });
        
        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_id']);
        });

        Schema::table('payment_approveds', function (Blueprint $table) {
            $table->dropForeign(['payment_id']);
            $table->dropForeign(['approved_by']);
        });
    }
};
