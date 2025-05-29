@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h2>Edit Product</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Поля такі ж, як у create, але з value="{{$product->…}}" -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   value="{{ $product->name }}" required>
        </div>
        <!-- ... інші поля аналогічно ... -->

        <button type="submit" class="btn">Update Product</button>
    </form>
</div>
@endsection
