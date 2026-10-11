@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <span class="text-xs font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded font-bold">{{ $course->code }}</span>
        <h1 class="text-2xl font-bold text-slate-900 mt-2">{{ $course->title }}</h1>
        <p class="text-xs text-slate-500 mt-1">Credits: {{ $course->credits }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-4">Enrolled Students ({{ $course->students->count() }})</h2>
            <div class="space-y-2">
                @forelse($course->students as $student)
                <div class="flex justify-between items-center p-3 bg-slate-50 border rounded text-sm">
                    <span>{{ $student->student_number }} - {{ $student->full_name }}</span>
                    <a href="{{ route('students.show', $student->id) }}" class="text-xs text-blue-600 font-bold hover:underline">View</a>
                </div>
                @empty
                <p class="text-sm text-slate-500">No students enrolled in this course yet.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-4">Course Activities ({{ $course->activities->count() }})</h2>
            <div class="space-y-2">
                @forelse($course->activities as $activity)
                <div class="flex justify-between items-center p-3 bg-slate-50 border rounded text-sm">
                    <span>{{ $activity->title }}</span>
                    <a href="{{ route('activities.show', $activity->id) }}" class="text-xs text-blue-600 font-bold hover:underline">View</a>
                </div>
                @empty
                <p class="text-sm text-slate-500">No activities created for this course yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection