<?php

namespace Tests\Unit\Fillable;

use App\Models\Notification;
use PHPUnit\Framework\TestCase;

class NotificationFillableTest extends TestCase
{
    /**
     * Test if notification columns structure are correctly.
     *
     * @return void
     */
    public function test_if_notification_columns_are_correctly()
    {
        $notification = new Notification();

        $expected = [
            'data',
            'type',
            'notifiable',
            'read_at'
        ];

        $arrayCompare = array_diff($expected, $notification->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
