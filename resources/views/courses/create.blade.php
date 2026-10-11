@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-4">Create New Course</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Code</label>
            <input type="text" name="code" value="{{ old('code') }}" placeholder="e.g. IT101" required class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-200">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Title</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Introduction to Computing" required class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-200">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Credits</label>
            <input type="number" name="credits" value="{{ old('credits', 3) }}" min="1" max="10" required class="w-full border rounded p-2 text-sm focus:ring focus:ring-blue-200">
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 text-sm">Save Course</button>
    </form>
</div>
@endsection