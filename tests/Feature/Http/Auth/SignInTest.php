<?php

namespace Tests\Feature\Http\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\HasDummyUser;
use Tests\TestCase;

class SignInTest extends TestCase
{
    use RefreshDatabase, HasDummyUser;

    protected $credentials;

    /**
     *  setUp dummy user credentials.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->credentials = [
            'email' => 'dummyuser@test.com',
            'password' => 'secret1234',
        ];
    }

    /**
     *  Test if login route responds ok.
     */
    public function test_if_login_route_responds_ok()
    {
        $this->get('/login')->assertOk()->assertViewIs('auth.login');
    }

    /**
     *  Test if an user can't see login page if authenticated.
     */
    public function test_if_user_cant_view_login_page_when_authenticated()
    {
        $user = $this->createDummyUser($this->credentials);

        $this->actingAs($user)->get('/login')->assertRedirect('/home');
    }

    /**
     *  Assert an user can't login with an invalid password.
     */
    public function test_if_user_cant_login_with_incorrect_password()
    {
        $this->withoutMiddleware();

        $user = $this->createDummyUser($this->credentials);
        
        $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ])
        ->assertRedirect('/login');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}