<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\StatusNotification;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('comment_picture')) {
            $image = $request->file('comment_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $small = public_path('img/tweets/small/' . $filename);
            $medium = public_path('img/tweets/medium/' . $filename);
            $large = public_path('img/tweets/large/' . $filename);

            \Image::make($image)->resize(600, 400)->save($small);
            \Image::make($image)->resize(800, 600)->save($medium);
            \Image::make($image)->resize(1920, 1080)->save($large);

            $data['photo'] = $filename;
        }

        $data['user_id'] = Auth::id();

        $status = Comment::create($data);

        $tweetAuthor = User::where('id', $request->author_id)->first();

        $details = [
            'title' => '@' . Auth::user()->username . ' comentou no seu tweet!',
            'actionURL' => route('tweet.show', $request->tweet_id),
            'fas' => 'fa-comment',
        ];

        if ($status) {
            if ($request->author_id != Auth::id()) {
                \Notification::send($tweetAuthor, new StatusNotification($details));
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
