<?php

namespace Isswp101\Timer\Test;

use Isswp101\Timer\TimerPool;

class TimerPoolTest extends \PHPUnit_Framework_TestCase
{
    public function testTimerPool()
    {
        $pool = new TimerPool('H:i:s');

        $pool->start('FIRST_MARKER');
        usleep(1000000);
        $pool->stop('FIRST_MARKER');

        $pool->start('SECOND_MARKER');
        usleep(3000000);
        $pool->stop('SECOND_MARKER');

        $pool->start('THIRD_MARKER');
        usleep(2000000);
        $pool->stop('THIRD_MARKER');

        $result = $pool->build();

        $this->assertEquals('00:00:03', reset($result));
        $this->assertEquals(['SECOND_MARKER', 'THIRD_MARKER', 'FIRST_MARKER'], array_keys($result));
    }
}