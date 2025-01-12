@extends('layouts.app')

<h1>LIST OF TASKS:</h1>



@section('content')

<nav class="mb-4" >
        <a href="{{ route('tasks.create') }}"class="link">Add task</a>
</nav>


        @forelse ($tasks as $task)
        
        <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['font-bold','line-through'=>$task->completed])>{{ $task->title }}</a>

        </div>
        @empty

        <div>There is no tasks</div>
        
        @endforelse

        @if ($task->count())
                <nav class="mt-4">
                        {{ $tasks->links() }}   
                </nav>   
        @endif
@endsection



