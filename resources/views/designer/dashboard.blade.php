@extends('layouts.app')

@section('content')

{{-- Success message after upload --}}
@if (session('success'))
    <div class="max-w-4xl mx-auto mt-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Dashboard Header + CTA --}}
<div class="max-w-4xl mx-auto mt-10 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">🎨 Designer Dashboard</h1>
        <p class="text-sm text-gray-500 mt-1">Welcome back, {{ Auth::user()->name }}!</p>
    </div>
    <a href="{{ route('designer.room-packs.create') }}"
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        ➕ Upload Room Pack
    </a>
</div>

{{-- Stats Grid --}}
<div class="max-w-4xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-100">📦 Rooms Assigned</h3>
        <p class="text-4xl font-semibold mt-2 text-blue-600 dark:text-blue-400">{{ $roomCount }}</p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-100">⏱️ Hours Worked</h3>
        <p class="text-4xl font-semibold mt-2 text-blue-600 dark:text-blue-400">{{ $hoursWorked }}</p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-100">🔁 Revisions Made</h3>
        <p class="text-4xl font-semibold mt-2 text-blue-600 dark:text-blue-400">{{ $revisions }}</p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-100">💰 Payments Received</h3>
        <p class="text-4xl font-semibold mt-2 text-green-600 dark:text-green-400">₹{{ number_format($payments, 2) }}</p>
    </div>

</div>

@if ($weather)
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-gradient-to-r from-sky-100 to-indigo-100 border-l-4 border-blue-400 rounded-xl shadow-sm">
        <div class="flex items-center gap-4">
            <div class="text-3xl">🌤️</div>
            <div>
                <h3 class="text-lg font-bold text-gray-800">
                    Weather in <span class="text-indigo-700">{{ $weather['city'] }}</span>
                </h3>
                <p class="text-sm text-gray-700 mt-1">
                    Current Temp: <strong>{{ $weather['temp'] }}°C</strong> |
                    Condition: <strong>{{ $weather['condition'] }}</strong>
                </p>
                <p class="mt-2 text-sm text-blue-700 italic">🎨 Design Tip: {{ $weatherTip }}</p>
            </div>
        </div>
    </div>
@endif



@endsection
