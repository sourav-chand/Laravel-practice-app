@extends('layout')

@section('title', $task->title)

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex items-start justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold {{ $task->completed ? 'text-gray-400 line-through' : 'text-gray-800' }}">{{ $task->title }}</h1>
            <p class="text-sm text-gray-500 mt-1">Created {{ $task->created_at->diffForHumans() }}</p>
        </div>
        <span class="px-3 py-1 rounded-full text-sm {{ $task->completed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
            {{ $task->completed ? 'Completed' : 'Pending' }}
        </span>
    </div>

    @if($task->description)
        <div class="prose prose-sm max-w-none text-gray-700 mb-6">
            {!! nl2br(e($task->description)) !!}
        </div>
    @else
        <p class="text-gray-400 italic mb-6">No description.</p>
    @endif

    <div class="flex gap-2">
        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 rounded {{ $task->completed ? 'bg-yellow-500 text-white hover:bg-yellow-600' : 'bg-green-500 text-white hover:bg-green-600' }}">
                {{ $task->completed ? 'Mark Pending' : 'Mark Complete' }}
            </button>
        </form>
        <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">Edit</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-50">Back</a>
    </div>
</div>
@endsection
