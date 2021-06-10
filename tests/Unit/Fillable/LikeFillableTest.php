<?php

namespace Tests\Unit\Fillable;

use App\Models\Like;
use PHPUnit\Framework\TestCase;

class LikeFillableTest extends TestCase
{
    /**
     * Test if like columns structure are correctly.
     *
     * @return void
     */
    public function test_if_like_columns_are_correctly()
    {
        $like = new Like();

        $expected = [
            'user_id',
            'tweet_id',
        ];

        $arrayCompare = array_diff($expected, $like->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
