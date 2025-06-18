@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 p-8 text-white">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-extrabold mb-8 tracking-wide drop-shadow-lg">Products</h2>

    <a href="{{ route('admin.products.create') }}"
       class="inline-block mb-8 px-6 py-3 rounded-full bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500
              shadow-lg hover:scale-105 transform transition duration-300 font-semibold text-white">
      + Add Product
    </a>

    @if(session('success'))
      <div class="mb-8 rounded bg-green-800 bg-opacity-50 px-6 py-3 shadow-lg text-green-300 font-medium">
        {{ session('success') }}
      </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($products as $product)
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-shadow duration-300 transform hover:scale-[1.03] cursor-pointer">
          <h3 class="text-2xl font-semibold mb-2 text-white drop-shadow-md">{{ $product->name }}</h3>
          <p class="text-gray-300 text-sm min-h-[52px] mb-4">{{ $product->description ?? 'No description available' }}</p>

          <div class="flex flex-wrap gap-3 mb-6">
            @foreach($product->categories as $cat)
              <span class="bg-gradient-to-tr from-indigo-700 to-purple-700 text-white px-3 py-1 rounded-full text-xs font-semibold
                            shadow-md select-none">
                {{ $cat->name }}
              </span>
            @endforeach
          </div>

          <div class="flex gap-4">
            <a href="{{ route('admin.products.edit', $product) }}"
               class="flex-1 text-center rounded-full bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500
                      py-3 font-semibold text-white shadow-lg hover:from-indigo-600 hover:to-pink-600 transition-transform duration-300
                      hover:scale-105">
              Edit
            </a>

            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="flex-1">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="w-full rounded-full bg-red-600 bg-opacity-90 py-3 font-semibold text-white shadow-lg
                             hover:bg-red-700 transition-transform duration-300 hover:scale-105">
                Delete
              </button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
