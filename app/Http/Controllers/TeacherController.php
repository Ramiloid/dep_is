<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plan;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index', [
            'teachers' => Teacher::query()->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
        ]);
    }

    public function plan(Request $request, Teacher $teacher)
    {
        $years = $request->input('years') ?? 4;
        return view('teachers.plan', [
            'teacher' => $teacher,
            'plans' => $teacher->plans()->where('years', $years)->orderBy('semester')->get(),
            'years' => $years,
        ]);
    }

    public function schedule(Request $request, Teacher $teacher)
    {
        $semester = $request->input('semester') ?? 1;
        return view('teachers.schedule', [
            'teacher' => $teacher,
            'semester' => $semester,
            'schedules' => $teacher->schedules()->where('schedules.semester', $semester)->orderBy('day')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Teacher::query()->create($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }
}
