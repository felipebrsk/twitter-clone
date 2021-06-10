<?php

namespace Tests\Unit\Fillable;

use App\Models\LikeComment;
use PHPUnit\Framework\TestCase;

class LikeCommentFillableTest extends TestCase
{
    /**
     * Test if likeComment columns structure are correctly.
     *
     * @return void
     */
    public function test_if_like_comment_columns_are_correctly()
    {
        $likeComment = new LikeComment();

        $expected = [
            'user_id',
            'comment_id',
        ];

        $arrayCompare = array_diff($expected, $likeComment->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
