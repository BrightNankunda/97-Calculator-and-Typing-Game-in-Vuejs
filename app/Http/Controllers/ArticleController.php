<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    public function index() {
        
        $articles = Article::orderBy('created_at', 'desc')->get();
        //$articles = Article::paginate(2);
        // if(isNotEmpty($articles)) {
        //     return response()->json('articles are empty');
        // }
        // return response()->json($articles);
        return ArticleResource::collection($articles);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'string|required',
            'body' => ''
        ]);

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        // $article = new Article;
        // $article->title = $request->title;
        // $article->body = $request->body;
        // $article->save();

        return response()->json($article);
    }

    public function store(Request $request) 
    {
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;
        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        
        if($article->save()) {
            return new ArticleResource($article);
        }
    }

    public function show($id) {
        //$article = Article::where('id', $id)->get();
        $article = Article::findOrFail($id);
        //return response()->json($article);
        return new ArticleResource($article);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->update();
        return response()->json($article);
    }

    public function delete($id) 
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['Deleted', $article]);
    }
}
