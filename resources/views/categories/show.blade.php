@extends('layouts.app')

@section('content')
    <h1>{{ $category->category_name }}</h1>
    <p>{{ $category->description }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
@endsection