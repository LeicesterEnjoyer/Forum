<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $threads = Thread::with('category', 'user')->get();
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('threads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Thread::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => Auth::id() // Associate with the logged-in user
        ]);

        return redirect()->route('threads.index')->with('success', 'Thread created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        $categories = Category::all();
        return view('threads.edit', compact('thread', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $thread->update($request->all());
        return redirect()->route('threads.index')->with('success', 'Thread updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()->route('threads.index')->with('success', 'Thread deleted successfully.');
    }
}
