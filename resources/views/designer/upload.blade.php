@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">📤 Upload New Room Pack</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('designer.room-packs.store') }}" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
        @csrf

        {{-- Title --}}
        <div>
            <label for="title" class="block font-medium text-gray-700 dark:text-gray-200 mb-1">📌 Room Pack Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" required
                   placeholder="e.g., Living Room - Premium Set"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Cover Render --}}
        <div>
            <label for="cover" class="block font-medium text-gray-700 dark:text-gray-200 mb-1">🖼️ Cover Render <span class="text-red-500">*</span></label>
            <input type="file" name="cover" id="cover" required
                   accept="image/png, image/jpeg"
                   class="w-full border-gray-300 rounded-md">
            <p class="text-sm text-gray-500 mt-1">Upload a high-quality JPG/PNG. Max: 5MB</p>
        </div>

        {{-- Optional Renders --}}
        <div>
            <label for="optional_renders" class="block font-medium text-gray-700 dark:text-gray-200 mb-1">🖼️ Optional Renders (max 3)</label>
<input type="file" name="optional_renders[]" multiple accept="image/png, image/jpeg">

            <p class="text-sm text-gray-500 mt-1">Upload up to 3 optional images. Each ≤ 5MB</p>
        </div>

        {{-- PDF Drawing --}}
        <div>
            <label for="pdf" class="block font-medium text-gray-700 dark:text-gray-200 mb-1">📄 2D Drawing (PDF) <span class="text-red-500">*</span></label>
            <input type="file" name="pdf" id="pdf" required accept="application/pdf"
                   class="w-full border-gray-300 rounded-md">
            <p class="text-sm text-gray-500 mt-1">PDF format only. Max 5MB.</p>
        </div>

        {{-- Material Chart --}}
        <div>
            <label for="chart" class="block font-medium text-gray-700 dark:text-gray-200 mb-1">📊 Decor / Material Chart</label>
            <input type="file" name="chart" accept=".csv"
                   class="w-full border-gray-300 rounded-md mb-2">
            <input type="url" name="chart_link"
                   placeholder="Or provide external chart URL"
                   class="w-full border-gray-300 rounded-md"
            >
            <p class="text-sm text-gray-500 mt-1">Upload CSV or provide a link to Google Sheet / Notion etc.</p>
        </div>

        {{-- Submit --}}
        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                🚀 Upload Room Pack
            </button>
        </div>

    </form>
</div>
@endsection
