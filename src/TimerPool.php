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
     * @var string
     */
    private $format;

    /**
     * Create a new TimerPool instance.
     *
     * @param string $format
     */
    public function __construct($format = 'H:i:s.ms')
    {
        $this->timers = [];
        $this->format = $format;
    }

    /**
     * Start timer with a specific marker.
     *
     * @param string $marker
     */
    public function start($marker)
    {
        $this->timers[$marker] = new Timer($this->format);
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
