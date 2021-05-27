<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Notifications\StatusNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verifyExists = Follow::where('follower_id', Auth::id())->where('following_id', $request->following_id)->first();

        if ($verifyExists) {
            return back()->withErrors('Vocês já são amigos!');
        } else {
            $status = Follow::create([
                'follower_id' => $request->follower_id,
                'following_id' => $request->following_id,
            ]);
        }

        $following = User::where('id', $request->following_id)->first();
        $follower = User::where('id', Auth::id())->first();

        $detailsFollowing = [
            'title' => Auth::user()->username . ' começou a seguir você!',
            'actionURL' => route('profile.show', $request->following_name),
            'fas' => 'fa-user-plus',
        ];

        $detailsFollower = [
            'title' => 'Você seguiu ' . $request->following_name,
            'actionURL' => route('profile.show', $request->following_name),
            'fas' => 'fa-user-plus',
        ];

        if ($status) {
            \Notification::send($following, new StatusNotification($detailsFollowing));
            \Notification::send($follower, new StatusNotification($detailsFollower));

            return redirect()->route('profile.show', $request->following_name);
        } else {
            return redirect()->route('profile.show', $request->following_name)->withErrors('Algo errado aconteceu. Tente novamente ou envie-nos um ticket para investigar a situação.');
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
    public function destroy(Request $request, $id)
    {
        $follow = Follow::findOrFail($id);

        $status = $follow->delete();

        $user = User::where('username', $request->following_name)->first();
        $authUser = User::where('username', Auth::user()->username)->first();

        $detailsUser = [
            'title' => '@' . Auth::user()->username . ' deixou de te seguir.',
            'actionURL' => route('profile.show', Auth::user()->username),
            'fas' => 'fa-sad-tear',
        ];

        $detailsAuth = [
            'title' => 'Você deixou de seguir @' . $request->following_name,
            'actionURL' => route('profile.show', $request->following_name),
            'fas' => 'fa-sad-tear',
        ];

        if ($status) {
            \Notification::send($user, new StatusNotification($detailsUser));

            \Notification::send($authUser, new StatusNotification($detailsAuth));
            
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('Não foi possível completar esta ação. Por favor, tente novamente ou envie-nos um ticket para investigar o que está acontecendo.');
        }
    }

    public function following($username)
    {
        $user = User::getUserByUsername($username);

        $title = 'Pessoas seguidas por ' . $user->name . ' (@' . $user->username . ')';

        return view('user.following', compact('user', 'title'));
    }

    public function followers($username)
    {
        $user = User::getUserByUsername($username);

        $title = 'Pessoas que seguem ' . $user->name . ' (@' . $user->username . ')';

        return view('user.followers', compact('user', 'title'));
    }
}
