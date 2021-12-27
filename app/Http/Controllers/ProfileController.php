<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Notifications\StatusNotification;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $username)
    {
        $notification_count = Auth::user()->unreadNotifications->count();
        $name = Auth::user()->name . ' ' . '(@' . Auth::user()->username . ')';

        if ($notification_count > 0) {
            $title = '(' . $notification_count . ') ' . $username;
        } else {
            $title = $name;
        }

        $user = User::getUserByUsername($username);

        $details = [
            'title' => '@' . Auth::user()->username . ' viu o seu perfil',
            'actionURL' => route('profile.show', Auth::user()->username),
            'fas' => 'fa-eye',
        ];

        if (Auth::id() != $user->id) {
            $user->increment('views', 1);
            \Notification::send($user, new StatusNotification($details));
        }

        return view('user.profile', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $data = $request->all();

        $user = User::getUserByUsername($username);

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $filename = time() . '.' . $banner->getClientOriginalExtension();
            $location = public_path('img/banners/' . $filename);
            \Image::make($banner)->resize(1920, 1080)->save($location);
            if ($user->banner != null) {
                unlink(public_path('img/banners/' . $user->banner));
            }

            $data['banner'] = $filename;
        }

        if ($request->hasFile('profile-picture')) {
            $picture = $request->file('profile-picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('img/profiles/' . $filename);
            \Image::make($picture)->resize(800, 800)->save($location);
            if ($user->picture != null) {
                unlink(public_path('img/profiles/' . $user->picture));
            }

            $data['picture'] = $filename;
        }

        $user->update($data);

        return redirect()->route('profile.show', $user->username)->with('success_message', 'O seu perfil foi atualizado com sucesso!');
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
