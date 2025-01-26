@extends('layouts.app')

@section('content')
    <h1>Post</h1>
    <p>{{ $post->content }}</p>
    <p>Thread: {{ $post->thread->title }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
@endsection