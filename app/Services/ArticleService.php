<?php
namespace App\Services;

use App\Models\Article;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ArticleService
{
    protected $article;
    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    public function createArticle(Request $request){
        $article = new Article();
        $article -> title = $request -> title;
        $article -> body = $request -> body;
        $article -> user_id = Auth::user() -> user_id;
        $article->save();
    }
    public function editArticle(Request $request, $artcicleId)
    {
        $article = $this->article->find($artcicleId)->first();
        $article->update($request->all());
        return $article;
    }
}
