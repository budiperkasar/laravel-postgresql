<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return response($article->all());
    }

    public function getAllComment(Article $article)
    {
        $data = $article->with(['comments'])->get();

        return response()->json(['data' => $data]);
    }

    public function getArticleHasComment(Article $article)
    {
        $data = $article->has('comments')->orderBy('priority', 'ASC')->get();

        return response()->json(['data' => $data]);
    }

    public function countArticleHasComment(Article $article)
    {
        $data = $article->has('comments')->count();

        return response()->json($data);
    }

    public function getContributorDetail(Article $article)
    {
        $data = $article->with('user')->get();

        return response()->json(['data' => $data]);
    }

    public function getContributorDetailById(Article $article, $id)
    {
        $data = $article->with('user')->byId($id)->get();

        return response()->json(['data' => $data]);
    }

    public function getById($id, Article $article)
    {
        return $article->byId($id)->first();
    }

    public function getByCreatorId(Article $article, $id)
    {
        return $article->byCreator($id)->get();
    }

    public function getDataByUser(User $user, Article $article)
    {
//        $users = User::orderBy('created_at', 'DESC')->get();
//        $users = $user->all();
//        $users = User::with('article')->orderBy('created_at', 'DESC')->get();
//        $users = $user->with('article')->orderBy('created_at', 'DESC')->get();
//        $users = $user->with('comment')->orderBy('created_at', 'DESC')->get();

//            $users = $user->with('article')->get();
            $users = $user->with(['article' , 'article.comment'])->get();
            $articles = $article->with('user')->get();


        return response()->json(['data' => $users]);
    }
}
