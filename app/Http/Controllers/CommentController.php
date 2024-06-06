<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($articleId)
    {
        $comments = Comment::where('article_id', $articleId)->latest()->get();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|integer',
            'content' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(), // Make sure user is authenticated
            'article_id' => $request->article_id,
            'content' => $request->content,
            'created_at' => now(),
        ]);

        return response()->json($comment);
    }
}
