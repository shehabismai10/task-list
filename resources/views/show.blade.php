@extends('layouts.app')


@section('title',$task->title)

@section('content')

<div class="mb-4">
    <a href="{{ route('tasks.index') }}"class="font-medium text-gray-700 underline decoration-pink-500 "><- Go back to the task list</a>

</div>

<p class="mb-4 text-slay-700">{{ $task->description }}</p>
@if($task->long_description)
    <p class="mb-4 text-slay-700">{{ $task->long_description }}</p>
@endif
<p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} . Updated {{ $task->updated_at->diffForHumans() }}</p>



<!-- Displaying the boolean 'completed' -->
@if($task->completed)
    <p class=" mb-4 font-medium text-green-500">Completed</p>
@else
    <p class="mb-4 font-medium text-red-500">Not Completed</p>
@endif


<div class="flex gap-2">
    <a  href="{{ route('tasks.edit' , ['task'=>$task->id]) }}" class="btn">Edit</a>

    <form method="POST" action="{{ route('tasks.toggle-complete' , ['task'=>$task->id]) }}">
        @csrf
    @method('PUT')
    <button type="submit" class="btn">
        Mark as {{ $task->completed ? 'not completed' :'completed' }}
    </button>


    </form>
    

    <form action="{{ route('tasks.delete',['task'=>$task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection