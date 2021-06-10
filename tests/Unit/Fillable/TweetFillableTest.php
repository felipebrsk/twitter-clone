<?php

namespace Tests\Unit\Fillable;

use App\Models\Tweet;
use PHPUnit\Framework\TestCase;

class TweetFillableTest extends TestCase
{
    /**
     * Test if tweet columns structure are correctly.
     *
     * @return void
     */
    public function test_if_tweet_columns_are_correctly()
    {
        $tweet = new Tweet();

        $expected = [
            'title',
            'slug',
            'body',
            'photo',
            'is_fixed',
            'views',
            'category_id',
            'user_id',
        ];

        $arrayCompare = array_diff($expected, $tweet->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
