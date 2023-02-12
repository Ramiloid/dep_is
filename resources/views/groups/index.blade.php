@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Группы</h1>
        <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Курс</th>
            <th>Срок обучения</th>
            <th>Количество студентов</th>
            <th>Куратор</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                <td>{{ $group->grade }}</td>
                <td>{{ $group->years }}</td>
                <td>{{ $group->students_count }}</td>
                <td>{{ $group->teacher->fullName }}</td>
                <td class="text-end text-nowrap">
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit-{{ $group->id }}">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#delete-{{ $group->id }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@foreach($groups as $group)
    <div class="modal fade" tabindex="-1" id="delete-{{ $group->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('groups.delete', $group->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Удалить группу</h5>
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
    <div class="modal fade" tabindex="-1" id="edit-{{ $group->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('groups.edit', $group->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать группу</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label>Название</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required
                               value="{{ $group->name }}">
                    </div>
                    <div class="mb-4">
                        <label>Срок обучения</label>
                        <select name="years" class="form-control" required>
                            <option {{ 3 == $group->years ? 'selected' : '' }}>3</option>
                            <option {{ 4 == $group->years ? 'selected' : '' }}>4</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Курс</label>
                        <select name="grade" class="form-control" required>
                            @for($grade = 1; $grade <= $group->years; $grade++)
                                <option {{ $grade == $group->grade ? 'selected' : '' }}>{{ $grade }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Куратор</label>
                        <select name="teacher_id" class="form-control" required>
                            <option value="">-</option>
                            @foreach($teachers as $teacher)
                                <option
                                    value="{{ $teacher->id }}" {{ $teacher->id == $group->teacher_id ? 'selected' : '' }}>{{ $teacher->fullName }}</option>
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
        <form action="{{ route('groups.create') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Добавить группу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label>Название</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-4">
                    <label>Срок обучения</label>
                    <select name="years" class="form-control" required>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label>Курс</label>
                    <select name="grade" class="form-control" required>
                        @for($grade = 1; $grade <= 4; $grade++)
                            <option>{{ $grade }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-4">
                    <label>Куратор</label>
                    <select name="teacher_id" class="form-control" required>
                        <option value="">-</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->fullName }}</option>
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
