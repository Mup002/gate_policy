<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    //
    protected $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    public function createArticle(Request $request)
    {
        $this->authorize('create-post');
        $this->articleService->createArticle($request);
        return response()->json(['message'=>'Success'],200);
    }
    public function updateArticle(Request $request,$id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('edit-post', $article);
        return response()->json( $this->articleService->editArticle($request,$id));
    }
}
