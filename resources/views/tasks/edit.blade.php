@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $task->description }}</textarea>

        <button type="Submit">Update Task</button>
        <button type="Delete" class="btn btn btn-danger">Delete Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
@endsection
