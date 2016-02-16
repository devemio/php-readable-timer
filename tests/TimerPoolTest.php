<?php

use Isswp101\Timer\TimerPool;

class TimerPoolTest extends PHPUnit_Framework_TestCase
{
    public function testTimerPool()
    {
        $pool = new TimerPool();

        $pool->start('FIRST_MARKER');
        $pool->stop('FIRST_MARKER');

        $pool->start('SECOND_MARKER');
        $pool->stop('SECOND_MARKER');

        $this->assertEquals(2, count($pool->build()));
    }
}