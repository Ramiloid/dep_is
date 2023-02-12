<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = Group::query()->create(['name' => 'ИС-302', 'grade' => 3, 'years' => 4, 'teacher_id' => 1]);
        $group2 = Group::query()->create(['name' => 'ИС-302(с)', 'grade' => 3, 'years' => 3, 'teacher_id' => 2]);
        $group3 = Group::query()->create(['name' => 'ИС-402', 'grade' => 4, 'years' => 4, 'teacher_id' => 3]);
        $group1->students()->saveMany(Student::factory()->count(20)->create());
        $group2->students()->saveMany(Student::factory()->count(20)->create());
        $group3->students()->saveMany(Student::factory()->count(20)->create());
        foreach (Student::query()->whereIn('group_id', [2, 3])->get() as $student) {
            $student->update([
                'diploma_work' => fake()->sentence(),
                'teacher_id' => rand(1, 10),
            ]);
        }
    }
}
