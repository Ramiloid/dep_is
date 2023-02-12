<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index()
    {
        return view('diplomas.index', [
            'students' => Student::query()->whereHas('group', function (Builder $query) {
                $query->whereRaw('years = grade');
            })->orderBy('group_id')->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
            'teachers' => Teacher::query()->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }
}
