@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-tr from-blue-900 via-purple-700 to-teal-500 p-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-extrabold mb-8 text-white drop-shadow-lg tracking-tight">🔥 All Products</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div
                        class="bg-white/20 backdrop-blur-lg rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-[1.05] cursor-pointer text-gray-900">

                        <h3
                            class="text-2xl font-bold mb-2 bg-gradient-to-r from-black via-gray-800 to-black bg-clip-text text-transparent">
                            {{ $product->name }}
                        </h3>


                        <p class="text-white/90 mb-4 min-h-[60px]">{{ $product->description ?? 'No description available' }}</p>

                        <div class="flex flex-wrap gap-3">
                            @foreach($product->categories as $cat)
                                <span
                                    class="inline-block bg-gradient-to-r from-blue-400 to-teal-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                                    {{ $cat->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection