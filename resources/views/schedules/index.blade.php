@extends('layouts.app')
@section('content')
    <h1 class="mb-4">Расписание по группам</h1>
    <div class="row">
        @forelse($groups as $group)
            <div class="col-md-4">
                <div class="card">
                    <a href="{{ route('schedules.view', $group->id) }}" class="card-body btn">
                        <span class="h5">{{ $group->name }}</span>
                    </a>
                </div>
            </div>
            </tr>
        @empty
            <div class="col-12 text-center">Пока ничего</div>
        @endforelse
    </div>
@endsection
