<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $notification_count = Auth::user()->unreadNotifications->count();

        if ($notification_count > 0) {
            $title = '(' . $notification_count . ') ';
        }else {
            $title = '';
        }

        $tweets = Tweet::whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->orderBy('id', 'desc')->get();

        return view('home', compact('tweets', 'title'));
    }
}