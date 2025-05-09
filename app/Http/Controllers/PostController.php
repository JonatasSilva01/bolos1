<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post, 201); // Retorna o post criado
    }

    public function show($id)
    {
        return Post::findOrFail($id); // Retorna um post específico
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));

        return response()->json($post); // Retorna o post atualizado
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204); // Retorna no-content para exclusão bem-sucedida
    }
}
