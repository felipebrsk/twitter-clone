<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use App\Notifications\StatusNotification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TweetController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TweetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('tweet_picture')) {
            $image = $request->file('tweet_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Separate by sizes
            $small = public_path('img/tweets/small/' . $filename);
            $medium = public_path('img/tweets/medium/' . $filename);
            $large = public_path('img/tweets/large/' . $filename);

            // Make the image in each size defined
            \Image::make($image)->resize(600, 400)->save($small);
            \Image::make($image)->resize(800, 600)->save($medium);
            \Image::make($image)->resize(1920, 1080)->save($large);

            $data['photo'] = $filename;
        }

        $slug = Str::slug(Str::limit($request->body, 20));

        $count = Tweet::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();

        $followers = User::whereIn('id', Auth::user()->followsReq()->pluck('follower_id'))->get();

        $status = Tweet::create($data);

        $details = [
            'title' => '@' . Auth::user()->username . ' acabou de publicar um tweet!',
            'actionURL' => route('tweet.show', $status->id),
            'fas' => 'fa-newspaper',
        ];
        
        if ($status) {
            \Notification::send($followers, new StatusNotification($details));

            return redirect()->route('home')->with('success_message', 'Tweetado com sucesso!');
        } else {
            return back()->withErrors('Não foi possível publicar esse Tweet. Por favor, tente novamente ou entre em contato informando o problema!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        $title = $tweet->user->username . ' no Twiter: ' . Str::limit($tweet->body, 40, '...');
        
        return view('tweet.show', compact('tweet', 'title'));
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
     *  Fix the tweet to your profile page.
     *  
     *  @param \Illuminate\Http\Request $request;
     *  @return \Illuminate\Http\Response
     */
    public function fixTweet(Request $request)
    {
        $removeFixed = Tweet::query()->where('user_id', Auth::id());

        $removeFixed->update([
            'is_fixed' => 0,
        ]);

        $tweet = Tweet::findOrFail($request->tweet_id);

        $tweet->update([
            'is_fixed' => 1,
        ]);

        return redirect()->route('profile.show', Auth::user()->username)->with('success_message', 'Tweet fixado com sucesso!');
    }

    /** 
     *  Unfix the tweet from your profile page.
     *  
     *  @param \Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function unfixTweet(Request $request)
    {
        $tweet = Tweet::findOrFail($request->tweet_id);

        $tweet->update([
            'is_fixed' => 0,
        ]);

        return redirect()->route('profile.show', Auth::user()->username)->with('success_message', 'Tweet desfixado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tweet = Tweet::findOrFail($request->tweet_id);

        $tweet->delete(); 

        return redirect()->route('profile.show', Auth::user()->username)->with('success_message', 'O tweet foi deletado com sucesso!');
    }
}
