<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Services\UserService;

class UserController extends AbstractController
{
    public function index(UserService $userService, User $user)
    {
        $data = $userService->getUsers();

        return response()->json($data);
    }

    public function getUserById(User $user, $id)
    {
        $data = $user->find($id);

        return response()->json(['data' => $data]);
    }

    public function getUserByName(User $user, $name)
    {
        $data = $user->ofName($name)->get();
        dd($data);
    }

    public function getUsersWithArticles(User $user)
    {
//        $data = $user->get();
//        $data->load('articles');

        $data = $user->whereHas('articles')->get();
        $data->load(['articles']);

        return response()->json(['data', $data]);
    }

    public function getUserWithArticlesCreatedAtDesc(User $user)
    {
        $data = $user->with(['articles']);
        $data->orderBy('created_at', 'DESC');
        $data->get();

        return response()->json(['data' => $data]);
    }

    public function getUsersWithComments(User $user, UserService $userService)
    {
        $data = $userService->getUsersWithComments();

        return response()->json(['data', $data]);
    }

    public function getUsersWithArticlesAndCommentsWhereContentLike(UserService $userService, $word)
    {
        $data = $userService->getUsersWithArticlesAndCommentsWhereContentLike($word);

        return response()->json($data);
    }

    public function getArticlesByUserId(User $user, $id)
    {
        // Same result: select * from user where articles (join table) = $id
//        $data = $user->with(['article'])->find($id);

        $data = $user->find($id)->articles;

        return response()->json(['data', $data]);
    }

    public function getUserWithCommentsByUserId(UserService $userService, $id)
    {
        $data = $userService->getUserWithCommentsByUserId($id);

        return response()->json($data);
    }

    public function getUserWithArticlesCommentedById(User $user, $id)
    {

    }

    public function getArticlesWithCommentByUser(User $user)
    {
        $data = $user->with(['articles', 'articles.comments'])->get();

        return response()->json(['data', $data]);
    }

    public function getArticleWithCommentByUserId(User $user, Article $article, $id)
    {
        //SQL: select * from "comments" where "comments"."article_id" in (13, 16, 32) order by "updated_at" desc
        $data = $user->with([
            'articles' => function($q) { $q->orderBy('updated_at', 'DESC'); },
            'articles.comments' => function($q) { $q->orderBy('updated_at', 'DESC'); }
        ])->orderBy('created_at', 'DESC')->find($id);

        return response()->json(['data', $data]);
    }

    public function getUsersHasArticle(User $user)
    {
        $data = $user->has('articles')->get();

        return response()->json(['data' => $data]);
    }

    public function getUsersDoesntHaveArticle(User $user)
    {
        $data = $user->doesntHave('articles')->get();

        return response()->json(['data' => $data]);
    }


}
