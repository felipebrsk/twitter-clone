<?php

namespace Tests\Unit\Fillable;

use App\Models\Follow;
use PHPUnit\Framework\TestCase;

class FollowFillableTest extends TestCase
{
    /**
     * Test if follow columns structure are correctly.
     *
     * @return void
     */
    public function test_if_follow_columns_are_correctly()
    {
        $follow = new Follow();

        $expected = [
            'follower_id',
        'following_id',
        ];

        $arrayCompare = array_diff($expected, $follow->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
