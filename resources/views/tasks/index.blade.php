@extends('layouts.app')

@section('content')
    <h1>Список задач</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Добавить задачу</a>
    <div class="task-list">
        @foreach($tasks as $task)
            <div class="task">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Редактировать</a>
            </div>
        @endforeach
    </div>
@endsection
