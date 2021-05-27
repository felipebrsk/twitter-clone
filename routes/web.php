<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeCommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LikeReplyController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'welcome')->name('welcome');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('tweet', TweetController::class);
    Route::resource('like', LikeController::class);
    Route::resource('like-comment', LikeCommentController::class);
    Route::resource('like-reply', LikeReplyController::class);
    Route::resource('notification', NotificationController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('reply', ReplyController::class);

    Route::resource('profile', ProfileController::class);
    Route::resource('follow', FollowController::class);
    Route::get('profile/{username}/following', [FollowController::class, 'following'])->name('follow.following');
    Route::get('profile/{username}/followers', [FollowController::class, 'followers'])->name('follow.followers');
});

Route::view('/tests', 'tests');

Auth::routes();