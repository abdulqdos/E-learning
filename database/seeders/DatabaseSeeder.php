<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $users = User::factory(50)->create();

         $teachers = User::factory(8)->create(
             [
                 'role' => 'instructor'
             ]
         );

         $categories = Category::factory(8)->create();

         Course::factory(30)->recycle($teachers)->recycle($categories)->create();

<<<<<<< HEAD
        User::factory()->create([
=======
        $test = User::factory()->create([
>>>>>>> 98fde8b (initial)
            'name' => 'Test User',
            'email' => 'test@example.com',
            'profile_url' => 'default_url',
            'role' => 'instructor'
        ]);
<<<<<<< HEAD
=======

        Course::factory(4)
            ->recycle($categories)
            ->create([
                'instructor_id' => $test->id,
            ]);

>>>>>>> 98fde8b (initial)
    }
}
