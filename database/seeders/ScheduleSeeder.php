<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Plan;
use App\Models\Student;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Group::all() as $group) {
            for ($grade = 1; $grade <= $group->years; $grade++) {
                for ($semester = 1; $semester <= 2; $semester++) {
                    $plans = Plan::query()->where('grade', $grade)->where('semester', $semester)->get()->pluck('id');
                    for ($day = 1; $day <= 5; $day++) {
                        for ($lesson = 1; $lesson <= rand(2, 5); $lesson++) {
                            $group->schedules()->create([
                                'plan_id' => fake()->randomElement($plans),
                                'grade' => $grade,
                                'semester' => $semester,
                                'day' => $day,
                                'lesson' => $lesson,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
