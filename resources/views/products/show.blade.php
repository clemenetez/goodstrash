@extends('layouts.app')

@section('content')
<div>
    <h2>{{ $product->name }}</h2>
    @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}" alt="" class="product-image">
    @endif
    <p>{{ $product->description }}</p>
    <p>Price: ${{ number_format($product->price, 2) }}</p>
    <p>Category: {{ $product->category->name }}</p>
</div>
@endsection
