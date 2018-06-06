<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\IndexRequest;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index(IndexRequest $request)
    {
        $news = News::orderBy('created_at', 'DESC');

        if($request->has('category_id')) {
            $news->whereCategoryId($request->get('category_id'));
            // вообще, для фильтров юзаю czim/laravel-filter,
            // но т.к. тут одно поле, не стал его подключать...
        }

        $news = $news->get();
        $categories = Category::all();

        return view('news.index', compact('news', 'categories'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
