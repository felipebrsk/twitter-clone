<?php

namespace App\Http\Controllers;

use App\Models\{User, Like};
use Illuminate\Support\Facades\{Auth, DB, Notification};
use App\Notifications\StatusNotification;
use App\Http\Requests\Like\LikeRequest;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Like\LikeRequest $request;
     * @return \Illuminate\Http\Response
     */
    public function store(LikeRequest $request)
    {
        $data = $request->validated();

        if (
            DB::table('likes')
                ->where('user_id', Auth::id())
                ->where('likable_id', $data['likable_id'])
                ->exists()
        ) {
            return response()->json(['data' => ['message' => 'Você já curtiu esse tweet!']], 409);
        }

        $data['user_id'] = Auth::id();

        $status = Like::create($data);

        $tweetAuthor = User::where('id', $data['author_id'])->firstOrFail();

        $details = [
            'title' => '@' . Auth::user()->username . ' curtiu o seu tweet!',
            'actionURL' => route('tweet.show', $data['likable_id']), // Alterar home para url da publicação, quando existir
            'fas' => 'fa-heart',
        ];

        if ($status) {
            if ($data['author_id'] === Auth::id()) {
                return redirect()->route('home');
            } else {
                Notification::send($tweetAuthor, new StatusNotification($details));
                return redirect()->route('home');
            }
        } else {
            return back()->withErrors('Ocorreu um erro ao curtir o tweet... Tente novamente ou envie-nos um ticket para verificar a situação!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id;
     * @return void
     */
    public function destroy(string $id): void
    {
        Like::where('user_id', Auth::id())->where('likable_id', $id)->delete();
    }
}
