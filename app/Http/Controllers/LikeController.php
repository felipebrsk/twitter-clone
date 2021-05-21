<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Notifications\StatusNotification;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Tweet $tweet;
     * @param \Illuminate\Http\Request $request;
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verifyExists = Like::where('user_id', Auth::id())->where('tweet_id', $request->tweet_id)->first();

        if ($verifyExists) {
            return response()->json(['data' => ['message' => 'Você já curtiu esse tweet!']], 409);
        } else {
            $status = Like::create($request->all());
        }

        $tweetAuthor = User::where('id', $request->author_id)->first();

        $details = [
            'title' => '@' . Auth::user()->username . ' curtiu o seu tweet!',
            'actionURL' => route('home'), // Alterar home para url da publicação, quando existir
            'fas' => 'fa-heart',
        ];

        if ($status) {
            if ($request->author_id == Auth::id()) {
                return redirect()->route('home');
            } else {
                \Notification::send($tweetAuthor, new StatusNotification($details));
                return redirect()->route('home');
            }
        } else {
            return back()->withErrors('Ocorreu um erro ao curtir o tweet... Tente novamente ou envie-nos um ticket para verificar a situação!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id;
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::where('user_id', Auth::id())->where('tweet_id', $id)->first();

        $like->delete();

        return redirect()->route('home');
    }
}
