@extends('layouts.app')

@section('content')
<div>
    <h2>{{ $category->name }}</h2>
    <p>{{ $category->description }}</p>
</div>
@endsection
