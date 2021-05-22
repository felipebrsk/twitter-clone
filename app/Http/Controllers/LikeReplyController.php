<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeReply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\StatusNotification;

class LikeReplyController extends Controller
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
        $verifyExists = LikeReply::where('user_id', Auth::id())->where('reply_id', $request->reply_id)->first();

        if ($verifyExists) {
            return response()->json(['data' => ['message' => 'Você já curtiu esse comentário!']], 409);
        } else {
            $status = LikeReply::create($request->all());
        }

        $tweetAuthor = User::where('id', $request->author_id)->first();

        $details = [
            'title' => '@' . Auth::user()->username . ' curtiu o seu comentário!',
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
            return back()->withErrors('Ocorreu um erro ao curtir o comentário... Tente novamente ou envie-nos um ticket para verificar a situação!');
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
        $like = LikeReply::where('user_id', Auth::id())->where('reply_id', $id)->first();

        $like->delete();

        return redirect()->route('home');
    }
}
