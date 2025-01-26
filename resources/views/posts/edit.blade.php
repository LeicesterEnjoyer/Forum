@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thread_id" class="form-label">Thread</label>
            <select class="form-control" id="thread_id" name="thread_id" required>
                @foreach ($threads as $thread)
                    <option value="{{ $thread->id }}" {{ $post->thread_id == $thread->id ? 'selected' : '' }}>
                        {{ $thread->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection