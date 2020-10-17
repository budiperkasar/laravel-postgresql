<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;

class ArticleController extends Controller
{
    public function index(Request $request, ArticleModel $article)
    {
        return response($article->all());
    }

    public function getById($id, ArticleModel $article)
    {
        return $article->byId($id)->first();
    }

    public function getByCreatorId(ArticleModel $article, $id)
    {
        return $article->byCreator($id)->get();
    }

}
