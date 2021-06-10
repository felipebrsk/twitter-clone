<?php

namespace Tests\Unit\Fillable;

use App\Models\LikeReply;
use PHPUnit\Framework\TestCase;

class LikeReplyFillableTest extends TestCase
{
    /**
     * Test if likeReply columns structure are correctly.
     *
     * @return void
     */
    public function test_if_like_reply_columns_are_correctly()
    {
        $likeReply = new LikeReply();

        $expected = [
            'user_id',
            'reply_id',
        ];

        $arrayCompare = array_diff($expected, $likeReply->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
