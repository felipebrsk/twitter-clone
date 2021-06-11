<?php

namespace Tests\Feature\Http\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\HasDummyUser;
use Tests\TestCase;

class SignOutTest extends TestCase
{
    use RefreshDatabase, HasDummyUser;

    /**
     *  Dummy user.
     *  @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->app->auth->login(
            $this->createDummyUser()
        );
    }

    /**
     * Test if sign out invalidate authentication.
     */
    public function test_if_sign_out_invalidate_authentication() {
        $this->withoutMiddleware();

        $this->post('/logout');

        $this->assertGuest();
    }
}
