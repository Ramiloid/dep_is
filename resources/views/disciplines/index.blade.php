@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-4">Дисциплины</h1>
        <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($disciplines as $discipline)
            <tr>
                <td>{{ $discipline->id }}</td>
                <td>{{ $discipline->name }}</td>
                <td class="text-end text-nowrap">
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit-{{ $discipline->id }}">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#delete-{{ $discipline->id }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center table-light">Пока ничего</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@foreach($disciplines as $discipline)
    <div class="modal fade" tabindex="-1" id="delete-{{ $discipline->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('disciplines.delete', $discipline->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Удалить дисциплину</h5>
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
    <div class="modal fade" tabindex="-1" id="edit-{{ $discipline->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('disciplines.edit', $discipline->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать дисциплину</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label>Название</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required value="{{ $discipline->name }}">
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
        <form action="{{ route('disciplines.create') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Добавить дисциплину</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label>Название</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
