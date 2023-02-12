@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Преподаватели</h1>
        <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>ФИО</th>
            <th>ИИН</th>
            <th>Телефон</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->fullName }}</td>
                <td>{{ $teacher->iin }}</td>
                <td>{{ $teacher->phone }}</td>
                <td class="text-end text-nowrap">
                    <a href="{{ route('teachers.plan', $teacher->id) }}" class="btn btn-light">
                        Нагрузка
                    </a>
                    <a href="{{ route('teachers.schedule', $teacher->id) }}" class="btn btn-light">
                        Расписание
                    </a>
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit-{{ $teacher->id }}">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#delete-{{ $teacher->id }}">
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
@foreach($teachers as $teacher)
    <div class="modal fade" tabindex="-1" id="delete-{{ $teacher->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('teachers.delete', $teacher->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Удалить преподавателя</h5>
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
    <div class="modal fade" tabindex="-1" id="edit-{{ $teacher->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('teachers.edit', $teacher->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать преподавателя</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label>Фамилия</label>
                        <input type="text" name="last_name" class="form-control" autocomplete="off" required value="{{ $teacher->last_name }}">
                    </div>
                    <div class="mb-4">
                        <label>Имя</label>
                        <input type="text" name="first_name" class="form-control" autocomplete="off" required value="{{ $teacher->first_name }}">
                    </div>
                    <div class="mb-4">
                        <label>Отчество</label>
                        <input type="text" name="middle_name" class="form-control" autocomplete="off" value="{{ $teacher->middle_name }}">
                    </div>
                    <div class="mb-4">
                        <label>ИИН</label>
                        <input type="text" name="iin" maxlength="12" class="form-control" autocomplete="off" required value="{{ $teacher->iin }}">
                    </div>
                    <div class="mb-4">
                        <label>Телефон</label>
                        <input type="tel" name="phone" class="form-control" autocomplete="off" value="{{ $teacher->phone }}">
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
        <form action="{{ route('teachers.create') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Добавить преподавателя</h5>
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
                    <label>Телефон</label>
                    <input type="tel" name="phone" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
