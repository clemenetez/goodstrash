@extends('layouts.app')

@section('content')
<div>
    <h2>Products</h2>

    @auth
        <a href="{{ route('products.create') }}" class="btn">Add Product</a>
    @endauth

    <form method="GET" action="{{ route('home') }}" style="margin: 20px 0;">
        <div style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            <select name="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn">Filter</button>
        </div>
    </form>

    <div class="product-list">
        @foreach($products as $product)
            <div class="product-card">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}"
                         alt="{{ $product->name }}"
                         class="product-image">
                @endif
                <h3>{{ $product->name }}</h3>
                <p>{{ Str::limit($product->description, 100) }}</p>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
                <p>Category: {{ $product->category->name }}</p>

                @auth
                    <div style="margin-top: 10px;">
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"
                                    style="background: #dc3545;">Delete</button>
                        </form>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>

    {{ $products->links() }}
</div>
@endsection
