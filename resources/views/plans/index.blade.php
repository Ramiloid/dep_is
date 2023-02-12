@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Учебные планы</h1>
        <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    </div>
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
            <th>Преподаватель</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($plans->groupBy('grade') as $grade => $gradePlans)
            <tr>
                <td colspan="5" class="text-center fw-bold">{{ $grade }} курс</td>
            </tr>
            @foreach($gradePlans->groupBy('semester') as $semester => $semesterPlans)
                <tr>
                    <td colspan="5" class="text-center fst-italic">{{ $semester }} семестр</td>
                </tr>
                @foreach($semesterPlans as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->discipline->name }}</td>
                        <td>{{ $plan->hours }}</td>
                        <td>{{ $plan->teacher->fullName }}</td>
                        <td class="text-end text-nowrap">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal"
                               data-bs-target="#edit-{{ $plan->id }}">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-light" data-bs-toggle="modal"
                               data-bs-target="#delete-{{ $plan->id }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        @empty
            <tr>
                <td colspan="7" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@foreach($plans as $plan)
    <div class="modal fade" tabindex="-1" id="delete-{{ $plan->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('plans.delete', $plan->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Удалить план</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы уверены?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button class="btn btn-danger">Удалить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="edit-{{ $plan->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('plans.edit', $plan->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать план</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="years" value="{{ $years }}">
                    <div class="mb-4">
                        <label>Дисциплина</label>
                        <select name="discipline_id" class="form-control" required>
                            <option value="">-</option>
                            @foreach($disciplines as $discipline)
                                <option
                                    value="{{ $discipline->id }}" {{ $discipline->id == $plan->discipline_id ? 'selected' : '' }}>{{ $discipline->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Количество часов</label>
                        <input type="number" step="0.5" name="hours" class="form-control" autocomplete="off" required
                               value="{{ $plan->hours }}">
                    </div>
                    <div class="mb-4">
                        <label>Курс</label>
                        <select name="grade" class="form-control" required>
                            @for($grade = 1; $grade <= $years; $grade++)
                                <option {{ $grade == $plan->grade ? 'selected' : '' }}>{{ $grade }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Семестр</label>
                        <select name="grade" class="form-control" required>
                            @for($semester = 1; $semester <= 2; $semester++)
                                <option {{ $semester == $plan->semester ? 'selected' : '' }}>{{ $semester }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Преподаватель</label>
                        <select name="teacher_id" class="form-control" required>
                            <option value="">-</option>
                            @foreach($teachers as $teacher)
                                <option
                                    value="{{ $teacher->id }}" {{ $teacher->id == $plan->teacher_id ? 'selected' : '' }}>{{ $teacher->fullName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<div class="modal fade" tabindex="-1" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('plans.create') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Добавить план</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="years" value="{{ $years }}">
                <div class="mb-4">
                    <label>Дисциплина</label>
                    <select name="discipline_id" class="form-control" required>
                        <option value="">-</option>
                        @foreach($disciplines as $discipline)
                            <option
                                value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label>Количество часов</label>
                    <input type="number" step="0.5" name="hours" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-4">
                    <label>Курс</label>
                    <select name="grade" class="form-control" required>
                        @for($grade = 1; $grade <= $years; $grade++)
                            <option>{{ $grade }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-4">
                    <label>Семестр</label>
                    <select name="grade" class="form-control" required>
                        @for($semester = 1; $semester <= 2; $semester++)
                            <option>{{ $semester }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-4">
                    <label>Преподаватель</label>
                    <select name="teacher_id" class="form-control" required>
                        <option value="">-</option>
                        @foreach($teachers as $teacher)
                            <option
                                value="{{ $teacher->id }}">{{ $teacher->fullName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
