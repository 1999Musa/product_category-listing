@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-white px-6 py-10 flex items-center justify-center">
    <div class="w-full max-w-xl bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-8 border border-white/10">

        <h1 class="text-3xl font-bold mb-6 text-center tracking-tight">➕ Add New Category</h1>

        @if($errors->any())
            <div class="bg-red-500/10 text-red-300 border border-red-500 p-4 rounded-lg mb-6">
                <ul class="list-disc pl-6 space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium mb-2 text-gray-200">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full bg-white/20 text-white border border-gray-600 rounded-xl px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                       placeholder="Enter a category name">
            </div>

            <div class="flex items-center justify-between pt-4">
                <button type="submit"
                        class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600 text-white font-semibold px-6 py-2.5 rounded-full shadow-lg hover:from-blue-600 hover:to-purple-700 transition duration-300 ease-in-out">
                    💾 Save
                </button>

                <a href="{{ route('admin.categories.index') }}"
                   class="text-sm text-white-400 bg-red-600 px-2 py-2 rounded  hover:text-white hover:underline transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
