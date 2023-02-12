@extends('layouts.app')
@section('content')
    <h1 class="mb-4">Дипломники</h1>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>ФИО</th>
            <th>Группа</th>
            <th>Тема диплома</th>
            <th>Руководитель</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->fullName }}</td>
                <td>{{ $student->group->name }}</td>
                <td>{{ $student->diploma_work }}</td>
                <td>{{ $student->teacher->fullName }}</td>
                <td class="text-end text-nowrap">
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit-{{ $student->id }}">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@foreach($students as $student)
    <div class="modal fade" tabindex="-1" id="edit-{{ $student->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('diplomas.edit', $student->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать студента</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label>Тема диплома</label>
                        <textarea name="diploma_work" class="form-control" rows="2">{{ $student->diploma_work }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label>Руководитель</label>
                        <select name="teacher_id" class="form-control">
                            <option value="">-</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $teacher->id == $student->teacher_id ? 'selected' : '' }}>{{ $teacher->fullName }}</option>
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
