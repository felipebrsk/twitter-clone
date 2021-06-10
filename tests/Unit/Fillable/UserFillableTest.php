<?php

namespace Tests\Unit\Fillable;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserFillableTest extends TestCase
{
    /**
     * Test if user columns structure are correctly.
     *
     * @return void
     */
    public function test_if_user_columns_are_correctly()
    {
        $user = new User();

        $expected = [
            'name',
            'email',
            'password',
            'username',
            'phone',
            'bio',
            'location',
            'views',
            'site',
            'picture',
            'banner',
            'birthdate',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
