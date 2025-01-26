@extends('layouts.app')

@section('content')
    <h1>{{ $thread->title }}</h1>
    <p>Category: {{ $thread->category->category_name }}</p>
    <a href="{{ route('threads.index') }}" class="btn btn-secondary">Back</a>
@endsection