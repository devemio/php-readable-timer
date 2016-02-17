<?php

namespace Isswp101\Timer\Test;

use Isswp101\Timer\Timer;

class TimerTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultTimerFormat()
    {
        $timer = new Timer;
        $this->assertRegExp('/\d{2}:\d{2}:\d{2}\.\d{3}/', $timer->end());
    }

    public function testTimerFormatWithoutHours()
    {
        $timer = new Timer('i:s.ms');
        $this->assertRegExp('/\d{2}:\d{2}\.\d{3}/', $timer->end());
    }

    public function testTimerFormatWithoutHoursAndMinutes()
    {
        $timer = new Timer('s.ms');
        $this->assertRegExp('/\d{2}\.\d{3}/', $timer->end());
    }

    public function testEmptyTimerFormat()
    {
        $timer = new Timer('');
        $this->assertEmpty($timer->end());
    }

    public function testCustomTimerFormat()
    {
        $timer = new Timer('H-i-s.ms');
        $this->assertRegExp('/\d{2}-\d{2}-\d{2}\.\d{3}/', $timer->end());
    }

    public function testTimerFormatWithMicroseconds()
    {
        $timer = new Timer('H:i:s.u');
        $this->assertRegExp('/\d{2}:\d{2}:\d{2}\.\d{6}/', $timer->end());
    }

    public function testTimer()
    {
        $timer = new Timer('H:i:s');
        usleep(1000000);
        $this->assertEquals('00:00:01', $timer->end());
    }
}