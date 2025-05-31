@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('products.edit', $product->id) }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" 
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>

            @if($product->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-64 object-cover rounded-lg">
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Price</h3>
                        <p class="text-2xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Category</h3>
                        <a href="{{ route('categories.show', $product->category->id) }}" 
                           class="text-blue-500 hover:text-blue-600">
                            {{ $product->category->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
