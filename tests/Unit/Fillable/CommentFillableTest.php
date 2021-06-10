<?php

namespace Tests\Unit\Fillable;

use App\Models\Comment;
use PHPUnit\Framework\TestCase;

class CommentFillableTest extends TestCase
{
    /**
     * Test if comment columns structure are correctly.
     *
     * @return void
     */
    public function test_if_comment_columns_are_correctly()
    {
        $comment = new Comment();

        $expected = [
            'user_id',
            'tweet_id',
            'comment',
            'photo',
        ];

        $arrayCompare = array_diff($expected, $comment->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
