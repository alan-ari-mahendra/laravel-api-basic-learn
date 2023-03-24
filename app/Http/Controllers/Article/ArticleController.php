<?php

namespace App\Http\Controllers\Article;

use Str;
use Illuminate\Http\Request;
use App\Models\Article\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(2);
        return new ArticleCollection($articles);
    }

    public function store(ArticleRequest $request)
    {

        $articles = auth()->user()->articles()->create($this->articleStore());

        return new ArticleResource($articles);
    }


    public function show(Article $article)
    {
        return new ArticleResource($article);
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($this->articleStore());

        return new ArticleResource($article);
    }


    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json('the article was deleted', 200);
    }

    public function articleStore()
    {
        return [
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'subject_id' => request('subject'),
        ];
    }
}
