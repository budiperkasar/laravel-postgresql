<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/article', [ArticleController::class, 'index']);

Route::group([], function() {
    Route::get('/article/detail/{id}', [ArticleController::class, 'getById']);
});

Route::get('/article/creator/{id}', [ArticleController::class, 'getByCreatorId']);

Route::get('/article/comments', [ArticleController::class, 'getAllComment']);

Route::get('/article/contributor', [ArticleController::class, 'getContributorDetail']);

Route::get('/article/has/comment', [ArticleController::class, 'getArticleHasComment']);

Route::get('/article/has/comment/count', [ArticleController::class, 'countArticleHasComment']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'getUserById']);

Route::get('/user/name/{name}', [UserController::class, 'getUserByName']);

Route::get('/users/articles', [UserController::class, 'getUsersWithArticles']);

Route::get('/users/comments', [UserController::class, 'getUsersWithComments']);

Route::get('/users/articles/{word}/comments', [UserController::class, 'getUsersWithArticlesAndCommentsWhereContentLike']);

Route::get('/user/{id}/comments', [UserController::class, 'getUserWithCommentsByUserId']);

Route::get('/user/{id}/articles/commented', [UserController::class, 'getUserWithArticlesCommentedById']);

Route::get('/user/{id}/articles', [UserController::class, 'getArticlesByUserId']);

Route::get('/users/articles/comments', [UserController::class, 'getArticlesWithCommentByUser']);

Route::get('/user/{id}/articles/comments', [UserController::class, 'getArticleWithCommentByUserId']);

Route::get('/users/has/article', [UserController::class, 'getUsersDoesntHaveArticle']);


