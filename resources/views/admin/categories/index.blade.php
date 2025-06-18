@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white min-h-screen px-6 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold tracking-tight">📁 Categories</h1>
            <a href="{{ route('admin.categories.create') }}"
               class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium px-5 py-2 rounded-full shadow-md hover:shadow-lg hover:from-blue-600 hover:to-indigo-700 transition duration-300 ease-in-out">
                + Add Category
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100/10 border-l-4 border-green-500 text-green-200 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-700 text-gray-300 text-sm font-semibold uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Products</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-100 text-sm divide-y divide-gray-700">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->products_count }}</td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="inline-block bg-indigo-500 text-white px-4 py-1.5 rounded-full hover:bg-indigo-600 transition duration-200 shadow-sm cursor-pointer">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="inline-block bg-red-500 text-white px-4 py-1.5 rounded-full hover:bg-red-600 transition duration-200 shadow-sm cursor-pointer">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400 italic">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
