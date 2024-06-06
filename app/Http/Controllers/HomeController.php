<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function welcome()
    {
        $articles = Article::all();
        return view('welcome', compact('articles'));
    }
}
