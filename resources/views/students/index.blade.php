@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Студенты</h1>
        <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>ФИО</th>
            <th>Группа</th>
            <th>ИИН</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->fullName }}</td>
                <td>{{ $student->group->name }}</td>
                <td>{{ $student->iin }}</td>
                <td class="text-end text-nowrap">
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit-{{ $student->id }}">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#delete-{{ $student->id }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@foreach($students as $student)
    <div class="modal fade" tabindex="-1" id="delete-{{ $student->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('students.delete', $student->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Удалить студента</h5>
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
    <div class="modal fade" tabindex="-1" id="edit-{{ $student->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('students.edit', $student->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать студента</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label>Фамилия</label>
                        <input type="text" name="last_name" class="form-control" autocomplete="off" required value="{{ $student->last_name }}">
                    </div>
                    <div class="mb-4">
                        <label>Имя</label>
                        <input type="text" name="first_name" class="form-control" autocomplete="off" required value="{{ $student->first_name }}">
                    </div>
                    <div class="mb-4">
                        <label>Отчество</label>
                        <input type="text" name="middle_name" class="form-control" autocomplete="off" value="{{ $student->middle_name }}">
                    </div>
                    <div class="mb-4">
                        <label>ИИН</label>
                        <input type="text" name="iin" maxlength="12" class="form-control" autocomplete="off" required value="{{ $student->iin }}">
                    </div>
                    <div class="mb-4">
                        <label>Группа</label>
                        <select name="group_id" class="form-control" required>
                            <option value="">-</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ $group->id == $student->group_id ? 'selected' : '' }}>{{ $group->name }}</option>
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
        <form action="{{ route('students.create') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Добавить студента</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label>Фамилия</label>
                    <input type="text" name="last_name" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-4">
                    <label>Имя</label>
                    <input type="text" name="first_name" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-4">
                    <label>Отчество</label>
                    <input type="text" name="middle_name" class="form-control" autocomplete="off">
                </div>
                <div class="mb-4">
                    <label>ИИН</label>
                    <input type="text" name="iin" maxlength="12" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-4">
                    <label>Группа</label>
                    <select name="group_id" class="form-control" required>
                        <option value="">-</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
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
