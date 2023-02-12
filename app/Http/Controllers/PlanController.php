<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Plan;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $years = $request->input('years') ?? 4;
        return view('plans.index', [
            'plans' => Plan::query()->where('years', $years)->orderBy('semester')->get(),
            'years' => $years,
            'teachers' => Teacher::query()->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
            'disciplines' => Discipline::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Plan::query()->create($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }
}
