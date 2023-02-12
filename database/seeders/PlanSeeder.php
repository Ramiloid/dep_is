<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Plan;
use App\Models\Student;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::query()->insert([
            [
                'years' => 3,
                'grade' => 1,
                'semester' => 1,
                'teacher_id' => 1,
                'discipline_id' => 11,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 1,
                'semester' => 1,
                'teacher_id' => 2,
                'discipline_id' => 12,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 1,
                'semester' => 1,
                'teacher_id' => 3,
                'discipline_id' => 13,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 1,
                'semester' => 2,
                'teacher_id' => 4,
                'discipline_id' => 14,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 1,
                'semester' => 2,
                'teacher_id' => 5,
                'discipline_id' => 15,
                'hours' => 36,
            ],
            //
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 1,
                'teacher_id' => 1,
                'discipline_id' => 10,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 1,
                'teacher_id' => 2,
                'discipline_id' => 9,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 1,
                'teacher_id' => 9,
                'discipline_id' => 8,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 2,
                'teacher_id' => 10,
                'discipline_id' => 7,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 2,
                'teacher_id' => 5,
                'discipline_id' => 6,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 2,
                'semester' => 2,
                'teacher_id' => 6,
                'discipline_id' => 5,
                'hours' => 36,
            ],
            //
            [
                'years' => 3,
                'grade' => 3,
                'semester' => 1,
                'teacher_id' => 9,
                'discipline_id' => 1,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 3,
                'semester' => 1,
                'teacher_id' => 10,
                'discipline_id' => 2,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 3,
                'semester' => 2,
                'teacher_id' => 5,
                'discipline_id' => 3,
                'hours' => 36,
            ],
            [
                'years' => 3,
                'grade' => 3,
                'semester' => 2,
                'teacher_id' => 6,
                'discipline_id' => 4,
                'hours' => 36,
            ],
            ///
            [
                'years' => 4,
                'grade' => 1,
                'semester' => 1,
                'teacher_id' => 1,
                'discipline_id' => 11,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 1,
                'semester' => 1,
                'teacher_id' => 2,
                'discipline_id' => 12,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 1,
                'semester' => 2,
                'teacher_id' => 3,
                'discipline_id' => 13,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 1,
                'semester' => 2,
                'teacher_id' => 4,
                'discipline_id' => 14,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 2,
                'semester' => 1,
                'teacher_id' => 5,
                'discipline_id' => 15,
                'hours' => 36,
            ],
            //
            [
                'years' => 4,
                'grade' => 2,
                'semester' => 1,
                'teacher_id' => 1,
                'discipline_id' => 10,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 2,
                'semester' => 2,
                'teacher_id' => 2,
                'discipline_id' => 9,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 2,
                'semester' => 2,
                'teacher_id' => 9,
                'discipline_id' => 8,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 3,
                'semester' => 1,
                'teacher_id' => 10,
                'discipline_id' => 7,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 3,
                'semester' => 1,
                'teacher_id' => 5,
                'discipline_id' => 6,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 3,
                'semester' => 2,
                'teacher_id' => 6,
                'discipline_id' => 5,
                'hours' => 36,
            ],
            //
            [
                'years' => 4,
                'grade' => 3,
                'semester' => 2,
                'teacher_id' => 9,
                'discipline_id' => 1,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 4,
                'semester' => 1,
                'teacher_id' => 10,
                'discipline_id' => 2,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 4,
                'semester' => 1,
                'teacher_id' => 5,
                'discipline_id' => 3,
                'hours' => 36,
            ],
            [
                'years' => 4,
                'grade' => 4,
                'semester' => 2,
                'teacher_id' => 6,
                'discipline_id' => 4,
                'hours' => 36,
            ],
        ]);
    }
}
