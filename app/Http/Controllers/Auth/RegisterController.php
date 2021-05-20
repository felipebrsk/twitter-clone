<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $date = date('Y');

        $min = $date - 120;

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required_without:phone', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required_without:email', 'string', 'min:15', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birth_month' => ['required', 'string'],
            'birth_day' => ['required', 'integer', 'between:1,31'],
            'birth_year' => ['required', 'integer', 'between:' . $min . ',' . $date],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (isset($data['phone'])) {
            return User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'username' => $data['username'],
                'birthdate' => date($data['birth_year'] . '/' . $data['birth_month'] . '/' . $data['birth_day']),
                'password' => Hash::make($data['password']),
            ]);
        } elseif (isset($data['email'])) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'birthdate' => date($data['birth_year'] . '/' . $data['birth_month'] . '/' . $data['birth_day']),
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
