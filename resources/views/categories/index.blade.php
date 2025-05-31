@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
        <a href="{{ route('categories.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
            Add Category
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        <a href="{{ route('categories.show', $category->id) }}" 
                           class="hover:text-blue-600">
                            {{ $category->name }}
                        </a>
                    </h3>
                    @if($category->description)
                        <p class="text-gray-600 text-sm mb-4">{{ $category->description }}</p>
                    @endif
                    <div class="flex justify-between items-center">
                        <a href="{{ route('categories.edit', $category->id) }}" 
                           class="text-blue-500 hover:text-blue-600">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all products in this category.')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:text-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>
</div>
@endsection
