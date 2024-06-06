<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'shortcut' => 'nullable|string',
            'author_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $content = $request->input('content');
        $thumbnail_url = null;

        if (strpos($content, '<img') !== false) {
            preg_match('/<img[^>]+src="([^">]+)"/', $content, $matches);
            $thumbnail_url = isset($matches[1]) ? $matches[1] : null;
        }

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $content;
        $article->shortcut = $request->input('shortcut');
        $article->thumbnail = $thumbnail_url;
        $article->author_name = $request->input('author_name');
        $article->category_id = $request->input('category_id');
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Bài báo đã được lưu thành công.');
    }

    public function index(Request $request)
    {
        $search_keyword = $request->input('search');
        $category_id = $request->input('category_id', 0);

        $query = Article::query();

        if ($category_id > 0) {
            $query->where('category_id', $category_id);
        }

        if (!empty($search_keyword)) {
            $query->where('title', 'like', '%' . $search_keyword . '%');
        }

        $articles = $query->get();

        return view('welcome', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    public function dashboard()
    {
        $articles = Article::all();
        return view('dashboard', compact('articles'));
    }
}
