@extends('layouts.app')
@section('content')
    <h1 class="mb-4">Расписание {{ $teacher->fullName }}</h1>
    <form action="" class="mb-4">
        <select name="semester" class="form-control w-auto" onchange="this.form.submit()">
            @for($s = 1; $s <= 2; $s++)
                <option value="{{ $s }}" {{ $semester == $s ? 'selected' : '' }}>{{ $s }} семестр</option>
            @endfor
        </select>
    </form>
    <table class="table table-bordered">
        <tbody>
        @forelse($schedules->groupBy('day') as $day => $daySchedules)
            <tr>
                <td colspan="5"
                    class="text-center fw-bold">{{ @['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница'][$day - 1] }}</td>
            </tr>
            @for($lesson = 1; $lesson <= 5; $lesson++)
                @php
                    $schedule = @$daySchedules->keyBy('lesson')[$lesson];
                @endphp
                <tr>
                    <td>{{ $lesson }}</td>
                    <td>
                        @if($schedule)
                            {{ $schedule?->plan?->discipline?->name }},
                            {{ $schedule?->group?->name }}
                        @endif
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
@endsection
