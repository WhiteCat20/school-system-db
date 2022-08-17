<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Course::create([
            'course_name' => 'Matematika'
        ]);
        Course::create([
            'course_name' => 'Fisika'
        ]);
        Course::create([
            'course_name' => 'Kimia'
        ]);

        SchoolClass::create([
            'class_name' => 'IPA 1'
        ]);
        SchoolClass::create([
            'class_name' => 'IPA 2'
        ]);
        Student::create([
            'student_number' => 'S0001',
            'name' => 'faiz rahmadani',
            'address'=> 'Surabaya',
            'email' => 'fzrahmadan@gmail.com',
            'phone_number' => '12345',
            //untuk foreign key langsung masukan saja id dari foreign key yang dituju
            'school_class_id' => 1
        ]);
        Teacher::create([
            'teacher_number' => 'T0001',
            'name' => 'faiz rahmadani',
            'address'=> 'Surabaya',
            'email' => 'fzrahmadan@gmail.com',
            'phone_number' => '12345',
            'course_id' => 1
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
