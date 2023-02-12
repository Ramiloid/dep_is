<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plan;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedules.index', [
            'groups' => Group::query()->withCount('students')->orderBy('name')->get(),
        ]);
    }

    public function show(Request $request, Group $group)
    {
        $grade = $request->input('grade') ?? 1;
        $semester = $request->input('semester') ?? 1;
        return view('schedules.view', [
            'group' => $group,
            'grade' => $grade,
            'semester' => $semester,
            'plans' => Plan::query()->where('grade', $grade)->where('semester', $semester)->get(),
            'schedules' => $group->schedules()->where('grade', $grade)->where('semester', $semester)->orderBy('day')->get(),
        ]);
    }

    public function update(Request $request, Group $group)
    {
        $grade = $request->input('grade') ?? 1;
        $semester = $request->input('semester') ?? 1;
        $schedules = [];
        foreach ($request->input('schedules') ?? [] as $day => $daySchedules) {
            foreach ($daySchedules ?? [] as $lesson => $schedule) {
                if (@$schedule['plan_id']) {
                    $schedules[] = $group->schedules()
                        ->updateOrCreate([
                            'grade' => $grade,
                            'semester' => $semester,
                            'day' => $day,
                            'lesson' => $lesson,
                        ], [
                            'plan_id' => $schedule['plan_id']
                        ])->id;
                }
            }
        }
        $group->schedules()->where('grade', $grade)->where('semester', $semester)->whereNotIn('id', $schedules)->delete();
        return redirect()->back()->with('success', 'Сохранено!');
    }
}
