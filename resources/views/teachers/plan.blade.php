@extends('layouts.app')
@section('content')
    <h1 class="mb-4">Учебные планы {{ $teacher->fullName }}</h1>
    <form action="" class="mb-4">
        <select name="years" class="form-control w-auto" onchange="this.form.submit()">
            <option value="3" {{ $years == 3 ? 'selected' : '' }}>3 года обучения</option>
            <option value="4" {{ $years == 4 ? 'selected' : '' }}>4 года обучения</option>
        </select>
    </form>
    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Дисциплина</th>
            <th>Кол-во часов</th>
            <th>Группы</th>
        </tr>
        </thead>
        <tbody>
        @forelse($plans->groupBy('grade') as $grade => $gradePlans)
            <tr>
                <td colspan="4" class="text-center fw-bold">{{ $grade }} курс</td>
            </tr>
            @foreach($gradePlans->groupBy('semester') as $semester => $semesterPlans)
                <tr>
                    <td colspan="4" class="text-center fst-italic">{{ $semester }} семестр</td>
                </tr>
                @foreach($semesterPlans as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->discipline->name }}</td>
                        <td>{{ $plan->hours }}</td>
                        <td>
                            @foreach($plan->schedules->pluck('group.name')->unique() as $group)
                                <div>
                                    {{ $group }}
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @endforeach
        @empty
            <tr>
                <td colspan="4" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
