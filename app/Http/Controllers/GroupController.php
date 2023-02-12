<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups.index', [
            'groups' => Group::query()->withCount('students')->orderBy('name')->get(),
            'teachers' => Teacher::query()->orderBy('last_name')->orderBy('first_name')->orderBy('middle_name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Group::query()->create($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->back()->with('success', 'Сохранено!');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back()->with('success', 'Удалено!');
    }
}
