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
            'username' => 'dummyuser',
            'phone' => '75981247326',
            'password' => 'secret1234',
        ];
    }

    /**
     *  Test if login route responds ok.
     */
    public function test_if_login_route_responds_ok()
    {
        $this->get('/login')
            ->assertOk()
            ->assertViewIs('auth.login');
    }

    /**
     *  Test if an user can't see login page if authenticated.
     */
    public function test_if_user_cant_view_login_page_when_authenticated()
    {
        $user = $this->createDummyUser($this->credentials);

        $this->actingAs($user)->get('/login')
            ->assertRedirect('/home');
    }

    /**
     *  Test if application redirect to login when not authenticated.
     */
    public function test_if_application_redirect_to_login_page_when_not_authenticated()
    {
        $this->get('/home')->assertRedirect('/login');
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
    
    /**
     *  Test if an user can sign in with a valid email.
     */
    public function test_if_an_user_can_sign_in_with_a_valid_email()
    {
        $this->withoutMiddleware();

        $user = $this->createDummyUser($this->credentials);
        
        $this->post('/login', [
            'credentials' => $this->credentials['email'],
            'password' => $this->credentials['password'] 
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     *  Test if an user can sign in with a valid username.
     */
    public function test_if_an_user_can_sign_in_with_a_valid_username()
    {
        $this->withoutMiddleware();

        $user = $this->createDummyUser($this->credentials);
        
        $this->post('/login', [
            'credentials' => $this->credentials['username'],
            'password' => $this->credentials['password'] 
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     *  Test if an user can sign in with a valid phone number.
     */
    public function test_if_an_user_can_sign_in_with_a_valid_phone_number()
    {
        $this->withoutMiddleware();

        $user = $this->createDummyUser($this->credentials);
        
        $this->post('/login', [
            'credentials' => $this->credentials['phone'],
            'password' => $this->credentials['password'] 
        ]);

        $this->assertAuthenticatedAs($user);
    }
}