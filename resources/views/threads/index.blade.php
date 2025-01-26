@extends('layouts.app')

@section('content')
    <h1>Threads</h1>
    <a href="{{ route('threads.create') }}" class="btn btn-primary mb-3">Create New Thread</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($threads as $thread)
                <tr>
                    <td>{{ $thread->title }}</td>
                    <td>{{ $thread->category->category_name }}</td>
                    <td>
                        <a href="{{ route('threads.edit', $thread->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('threads.destroy', $thread->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection