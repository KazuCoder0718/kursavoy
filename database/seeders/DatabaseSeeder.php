<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subgroup;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>Hash::make(123)
        ]);
        
        User::create([
            'name'=>'Aybergen',
            'email'=>'aybergen@gmail.com',
            'role'=>'teacher',
            'password'=>Hash::make(123)
        ]);
          
        User::create([
            'name'=>'Atabek',
            'email'=>'atabek@gmail.com',
            'role'=>'student',
            'password'=>Hash::make(123)
        ]);

        Group::create([
            'name'=>'2B'
        ]);

        Group::create([
            'name'=>'2A'
        ]);

        Group::create([
            'name'=>'3A'
        ]);

        Group::create([
            'name'=>'4G'
        ]);

        Subject::create([
            'name'=>'BackEnd'
        ]);

        Subject::create([
            'name'=>'Fizika'
        ]);

        Subject::create([
            'name'=>'Matematika'
        ]);

        Subject::create([
            'name'=>'Tariyx'
        ]);

        Subgroup::create([
            'subject_id'=>1,
            'group_id'=>1
        ]);

        Subgroup::create([
            'subject_id'=>2,
            'group_id'=>1
        ]);

        Subgroup::create([
            'subject_id'=>3,
            'group_id'=>1
        ]);

        Subgroup::create([
            'subject_id'=>4,
            'group_id'=>1
        ]);

        Subgroup::create([
            'subject_id'=>2,
            'group_id'=>2
        ]);

        Subgroup::create([
            'subject_id'=>3,
            'group_id'=>2
        ]);

        Subgroup::create([
            'subject_id'=>4,
            'group_id'=>2
        ]);

        Subgroup::create([
            'subject_id'=>1,
            'group_id'=>2
        ]);


        Subgroup::create([
            'subject_id'=>1,
            'group_id'=>3
        ]);

        Subgroup::create([
            'subject_id'=>2,
            'group_id'=>3
        ]);

        Subgroup::create([
            'subject_id'=>3,
            'group_id'=>3
        ]);

        Subgroup::create([
            'subject_id'=>4,
            'group_id'=>3
        ]);

        Subgroup::create([
            'subject_id'=>1,
            'group_id'=>4
        ]);

        Subgroup::create([
            'subject_id'=>2,
            'group_id'=>4
        ]);

        Subgroup::create([
            'subject_id'=>3,
            'group_id'=>4
        ]);

        Subgroup::create([
            'subject_id'=>4,
            'group_id'=>4
        ]);

        Teacher::create([
            'user_id'=>2,
            'subgroup_id'=>1
        ]);

        Student::create([
            'user_id'=>3,
            'group_id'=>1
        ]);
    }
}
