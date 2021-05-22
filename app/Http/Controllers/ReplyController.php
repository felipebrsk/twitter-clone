<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Reply::create([
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'reply' => $request->reply,
        ]);

        $commentAuthor = User::where('id', $request->author_id)->first();
        $tweetAuthor = User::where('id', $request->tweet_author)->first();

        $detailsToCommentAuthor = [
            'title' => '@' . Auth::user()->username . ' respondeu ao seu comentário!',
            'actionURL' => route('tweet.show', $request->tweet_id),
            'fas' => 'fa-comment',
        ];

        $detailsToTweetAuthor = [
            'title' => '@' . Auth::user()->username . ' comentou no seu tweet!',
            'actionURL' => route('tweet.show', $request->tweet_id),
            'fas' => 'fa-comment',
        ];

        if ($status) {
            if ($request->author_id != Auth::id()) {
                \Notification::send($commentAuthor, new StatusNotification($detailsToCommentAuthor));
                \Notification::send($tweetAuthor, new StatusNotification($detailsToTweetAuthor));
                return redirect()->route('tweet.show', $request->tweet_id)->with('success_message', 'Sua resposta foi publicada com sucesso!');
            } else {
                return redirect()->route('tweet.show', $request->tweet_id);
            }
        } else {
            return redirect()->route('tweet.show', $request->tweet_id)->withErros('Ocorreu um erro ao comentar. Por favor, tente novamente ou envie-nos um ticket para investigar o que está acontecendo.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
