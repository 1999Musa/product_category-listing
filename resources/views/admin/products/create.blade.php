@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white px-6 py-10 flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-10 border border-white/10">

        <h2 class="text-3xl font-bold mb-8 text-center tracking-tight">🚀 Add New Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium mb-2 text-gray-200">Product Name</label>
                <input type="text" name="name" id="name"
                       class="w-full bg-white/20 text-white border border-gray-600 rounded-xl px-4 py-2 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200"
                       placeholder="Enter product name" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium mb-2 text-gray-200">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full bg-white/20 text-white border border-gray-600 rounded-xl px-4 py-2 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200"
                          placeholder="Write a brief description..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2 text-gray-200">Select Categories</label>
                <div class="grid grid-cols-2 gap-3">
                    @foreach($categories as $category)
                        <label class="flex items-center space-x-2 bg-white/10 border border-gray-700 px-4 py-2 rounded-lg hover:bg-white/20 transition">
                            <input type="checkbox" name="categories[]"
                                   value="{{ $category->id }}"
                                   {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'checked' : '' }}
                                   class="accent-indigo-500 w-5 h-5 rounded bg-gray-800 border-gray-600 focus:ring-indigo-500">
                            <span class="text-sm text-gray-200">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="pt-4 text-center">
                <button type="submit"
                        class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold px-6 py-2.5 rounded-full shadow-lg hover:from-indigo-600 hover:to-pink-600 transition-all duration-300 ease-in-out">
                    💾 Save Product
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
