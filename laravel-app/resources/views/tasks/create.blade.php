@extends('layout')

@section('title', 'New Task')

@section('content')
<h1 class="text-2xl font-bold mb-6">New Task</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
    @csrf

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" required>
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (optional)</label>
        <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2 border-gray-300 focus:border-indigo-500 focus:outline-none">{{ old('description') }}</textarea>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Create Task</button>
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-50">Cancel</a>
    </div>
</form>
@endsection
