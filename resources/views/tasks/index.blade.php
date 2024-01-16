@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    
<!-- Include SortableJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    <ul id="sortable-list">
        @foreach ($tasks as $task)
            <li data-task-id="{{ $task->id }}">
                <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}">Create New Task</a>

    <script>
        // Initialize SortableJS
        var sortable = new Sortable(document.getElementById('sortable-list'), {
            animation: 150, // Animation duration in milliseconds
            onUpdate: function (evt) {
                // Get the new order of tasks
                var taskOrder = sortable.toArray();

                // Send the new order to the server using AJAX
                axios.post('{{ route('tasks.updateOrder') }}', {
                    taskOrder: taskOrder
                })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error);
                });
            }
        });
    </script>
@endsection
