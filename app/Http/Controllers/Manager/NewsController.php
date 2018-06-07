<?php

namespace App\Http\Controllers\Manager;

use App\Http\Requests\News\CreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    private $model;

    public function __construct(News $news)
    {
        $this->model = new Repository($news);
    }

    public function index()
    {
        $news = $this->model->getModel()->orderBy('created_at', 'DESC')->get();

        return view('manager.news.index', compact('news'));
    }

    public function make()
    {
        $categories = Category::all();

        return view('manager.news.make', compact('categories'));
    }

    public function create(CreateRequest $request)
    {
        $this->model->create($request->except('_token'));

        return redirect()->route('manager.news.index')->with('success', 'Новость создана!');
    }

    public function edit(News $news)
    {
        $categories = Category::all();

        return view('manager.news.edit', compact('news', 'categories'));
    }

    public function update(CreateRequest $request, $id)
    {
        $this->model->update($request->except('_token'), $id);

        return redirect()->route('manager.news.index')->with('success', 'Новость обновлена!');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->route('manager.news.index')->with('success', 'Новость удалена!');
    }

}
