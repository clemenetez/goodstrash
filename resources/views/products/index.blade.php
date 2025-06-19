@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Products</h2>
        <div class="space-x-2">
            @guest
                <a href="{{ route('register') }}" 
                   class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Register
                </a>
            @endguest

            @auth
                <a href="{{ route('products.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Add Product
                </a>
            @endauth
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <form method="GET" action="{{ route('home') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <input type="text" 
                       name="search" 
                       placeholder="Search products..." 
                       value="{{ request('search') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <select name="category"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" 
                        class="w-full bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <a href="{{ route('products.show', $product->id) }}" class="block hover:bg-gray-50 transition">
                    @if($product->image)
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 hover:text-blue-600 transition">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 100) }}</p>
                        <p class="text-lg font-bold text-blue-600 mb-2">${{ number_format($product->price, 2) }}</p>
                        <p class="text-sm text-gray-500 mb-4">
                            Category: <span class="font-medium">{{ $product->category->name }}</span>
                        </p>
                    </div>
                </a>
                @auth
                    <div class="p-4 pt-0">
                        <div class="flex justify-between items-center">
                            @can('update', $product)
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="text-blue-500 hover:text-blue-600">
                                    Edit
                                </a>
                            @endcan
                            @can('delete', $product)
                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-500 hover:text-red-600">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
