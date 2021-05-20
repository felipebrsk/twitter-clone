<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $status = Tweet::create($data);
        
        if ($status) {
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
