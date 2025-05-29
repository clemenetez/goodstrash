@extends('layouts.app')

@section('content')
<div>
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn">Add Category</a>

    <ul>
        @foreach($categories as $cat)
            <li>
                <a href="{{ route('categories.show', $cat->id) }}">{{ $cat->name }}</a>
                <a href="{{ route('categories.edit', $cat->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn" style="background:#dc3545;">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $categories->links() }}
</div>
@endsection
