<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        return view('disciplines.index', [
            'disciplines' => Discipline::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Discipline::query()->create($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function update(Request $request, Discipline $discipline)
    {
        $discipline->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function destroy(Discipline $discipline)
    {
        $discipline->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }
}
