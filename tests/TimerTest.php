<?php

use Isswp101\Timer\Timer;

class TimerTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultTimerFormat()
    {
        $timer = new Timer;
        $this->assertRegExp('/\d{2}:\d{2}:\d{2}\.\d{3}/', $timer->end());
    }

    public function testTimerFormatWithoutHours()
    {
        $timer = new Timer('i:s');
        $this->assertRegExp('/\d{2}:\d{2}\.\d{3}/', $timer->end());
    }

    public function testTimerFormatWithoutHoursAndMinutes()
    {
        $timer = new Timer('s');
        $this->assertRegExp('/\d{2}\.\d{3}/', $timer->end());
    }

    public function testEmptyTimerFormat()
    {
        $timer = new Timer('');
        $this->assertRegExp('/\.\d{3}/', $timer->end());
    }

    public function testCustomTimerFormat()
    {
        $timer = new Timer('H-i-s');
        $this->assertRegExp('/\d{2}-\d{2}-\d{2}\.\d{3}/', $timer->end());
    }
}