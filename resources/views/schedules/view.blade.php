@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Расписание {{ $group->name }}</h1>
        <button type="submit" form="main-form" class="btn btn-success">Сохранить</button>
    </div>
    <form action="" class="mb-4 row">
        <div class="col-auto">
            <select name="grade" class="form-control w-auto" onchange="this.form.submit()">
                @for($g = 1; $g <= $group->years; $g++)
                    <option value="{{ $g }}" {{ $grade == $g ? 'selected' : '' }}>{{ $g }} курс</option>
                @endfor
            </select>
        </div>
        <div class="col-auto">
            <select name="semester" class="form-control w-auto" onchange="this.form.submit()">
                @for($s = 1; $s <= 2; $s++)
                    <option value="{{ $s }}" {{ $semester == $s ? 'selected' : '' }}>{{ $s }} семестр</option>
                @endfor
            </select>
        </div>
    </form>
    <form action="{{ route('schedules.edit', $group->id) }}" method="POST" id="main-form">
        @csrf
        <input type="hidden" name="semester" value="{{ $semester }}">
        <input type="hidden" name="grade" value="{{ $grade }}">
        <table class="table table-bordered">
            <tbody>
            @forelse($schedules->groupBy('day') as $day => $daySchedules)
                <tr>
                    <td colspan="5"
                        class="text-center fw-bold">{{ @['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница'][$day - 1] }}</td>
                </tr>
                @for($lesson = 1; $lesson <= 5; $lesson++)
                    <tr>
                        <td>{{ $lesson }}</td>
                        <td>
                            <select name="schedules[{{ $day }}][{{ $lesson }}][plan_id]" class="form-control">
                                <option value="">-</option>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ @$daySchedules->keyBy('lesson')[$lesson]->plan_id == $plan->id ? 'selected' : '' }}>{{ $plan->discipline->name }}, {{ $plan->teacher->fullName }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endfor
            @empty
                <tr>
                    <td colspan="2" class="text-center table-light">Пока ничего</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </form>
@endsection
