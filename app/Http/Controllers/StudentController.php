<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::query()->orderBy('group_id')->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
            'groups' => Group::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Student::query()->create($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }
}
