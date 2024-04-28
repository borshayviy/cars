<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleForm;
use App\Models\Articles;
use App\Models\Categories;
use GuzzleHttp\Promise\Create;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::with('category')
            ->get();
        return view('articles.index',[
            'articles' => $articles
        ]);
    }
    public function create()
    {
        return view('articles.create', [
            'categories' => Categories::all()
        ]);
    }
    public function store(CreateArticleForm $request)
    {
        Articles::create($request->all());
        return redirect()->back()->with('alert', 'Ваша новость создана.');

    }
    public function show(string $slug)
    {
        DB::table('articles')
            ->where('slug', $slug)
            ->increment('view_count');

        $article = Articles::with('car', 'category')
            ->where('slug', $slug)
            ->first();
        return view('articles.show', [
            'article' => $article
        ]);
    }
}
