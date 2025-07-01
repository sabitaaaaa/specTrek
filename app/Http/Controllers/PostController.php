<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display all posts (index page).
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store new post into database.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image Upload Handling
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        // Save Post
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Show single post.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update existing post.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Validation
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image Update Handling
        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        // Update Post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Delete post.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Optionally delete image file from /public/uploads
        if ($post->image && file_exists(public_path('uploads/' . $post->image))) {
            unlink(public_path('uploads/' . $post->image));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
