@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>

    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
@endsection
