@extends('layout')

@section('title', 'All Tasks')

@section('content')
<h1 class="text-2xl font-bold mb-6">All Tasks</h1>

@if($tasks->isEmpty())
    <p class="text-gray-500">No tasks yet. <a href="{{ route('tasks.create') }}" class="text-indigo-600 hover:underline">Create one</a>.</p>
@else
    <div class="space-y-3">
        @foreach($tasks as $task)
            <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-6 h-6 rounded border-2 flex items-center justify-center {{ $task->completed ? 'bg-green-500 border-green-500 text-white' : 'border-gray-300 hover:border-indigo-500' }}">
                            @if($task->completed)
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @endif
                        </button>
                    </form>
                    <div>
                        <a href="{{ route('tasks.show', $task) }}" class="font-semibold {{ $task->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">{{ $task->title }}</a>
                        @if($task->description)
                            <p class="text-sm text-gray-500">{{ Str::limit($task->description, 60) }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-sm text-indigo-600 hover:underline">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
