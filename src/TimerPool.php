<?php

namespace Isswp101\Timer;

class TimerPool
{
    /**
     * @var Timer[]
     */
    protected $timers = [];

    /**
     * @var string[]
     */
    protected $markers = [];

    /**
     * Create a new TimerPool instance.
     */
    public function __construct()
    {
        $this->timers = [];
    }

    /**
     * Start timer with a specific marker.
     *
     * @param string $marker
     */
    public function start($marker)
    {
        $this->timers[$marker] = new Timer;
    }

    /**
     * Stop timer with a specific marker.
     *
     * @param string $marker
     */
    public function stop($marker)
    {
        if (array_key_exists($marker, $this->timers)) {
            $this->timers[$marker]->stop();
        }
    }

    /**
     * Return sorted times.
     *
     * @return string[]
     */
    public function build()
    {
        foreach ($this->timers as $marker => $timer) {
            $this->markers[$marker] = $timer->time();
        }
        arsort($this->markers);
        return $this->markers;
    }
}
