<?php

namespace Tests\Unit\Fillable;

use App\Models\Reply;
use PHPUnit\Framework\TestCase;

class ReplyFillableTest extends TestCase
{
    /**
     * Test if reply columns structure are correctly.
     *
     * @return void
     */
    public function test_if_reply_columns_are_correctly()
    {
        $reply = new Reply();

        $expected = [
            'user_id',
            'comment_id',
            'reply',
        ];

        $arrayCompare = array_diff($expected, $reply->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
