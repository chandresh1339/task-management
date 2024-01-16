@extends('layouts.app')
@section('content')
    <title>Task Mgt System</title>
    <h1>Create New Task</h1>
<form action="{{route('task.store')}} " method="post">
@csrf
<label>Title:</label>
<input type="text" name="title" required>
<label>Description:</label>
<textarea name="description" required></textarea>

<button type="submit">Create Task</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Tasks</a>
@endsection
    
