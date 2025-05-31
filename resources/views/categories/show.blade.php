@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h2>
            <div class="space-x-2">
                <a href="{{ route('categories.edit', $category->id) }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Edit Category
                </a>
                <form action="{{ route('categories.destroy', $category->id) }}" 
                      method="POST" 
                      class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all products in this category.')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                        Delete Category
                    </button>
                </form>
            </div>
        </div>

        @if($category->description)
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                <p class="text-gray-600">{{ $category->description }}</p>
            </div>
        @endif

        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Products in this Category</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($category->products as $product)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        @if($product->image)
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-48 object-cover">
                            </div>
                        @endif
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h4>
                            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-lg font-bold text-blue-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-3 text-center py-4">No products in this category yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
