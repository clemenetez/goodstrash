@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h2>Edit Category</h2>

    <form 
        method="POST" 
        action="{{ route('categories.update', $category->id) }}"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name', $category->name) }}" 
                required 
            >
            @error('name')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4"
            >{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Update Category</button>
    </form>
</div>
@endsection
