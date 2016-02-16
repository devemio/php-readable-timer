<?php

use Isswp101\Timer\Timer;

class TimerTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultTimerFormat()
    {
        $timer = new Timer;
        $this->assertRegExp('/\d{2}:\d{2}:\d{2}\.\d{3}/', $timer->end());
    }
}