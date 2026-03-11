<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('passwordadmin123'),
            'role' => User::ROLE_ADMIN,
        ]);
        User::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@example.com',
            'password' => bcrypt('passwordteacher123'),
            'role' => User::ROLE_TEACHER,
        ]);
        User::factory()->create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => bcrypt('passwordstudent123'),
            'role' => User::ROLE_STUDENT,
        ]);
        // User::factory(10)->create();
        DB::table('categories')->insert([
            'category_name' => 'Programming',
            'description' => 'Courses related to programming languages and software development.',
        ]);
        DB::table('courses')->insert([
            'title' => 'Introduction to Programming',
            'description' => 'Learn the basics of programming with this introductory course.',
            'status' => 'published',
            'price' => 49.99,
            'duration' => 10,
            'category_id' => 1,
            'teacher_id' => 3,
            'photo' => 'java.jpg',
        ]);
        DB::table('courses')->insert([
            'title' => 'Advanced Programming',
            'description' => 'Dive deeper into programming concepts and techniques.',
            'status' => 'published',
            'price' => 79.99,
            'duration' => 20,
            'category_id' => 1,
            'teacher_id' => 3,
            'photo' => 'web.jpg',
        ]);

    }
}
