<?php

namespace Isswp101\Timer;

class Timer
{
    /**
     * @var int
     */
    private $start = 0;

    /**
     * @var int
     */
    private $stop = 0;

    /**
     * @var string
     */
    private $format;

    /**
     * Create a new Timer instance and start it.
     *
     * @param string $format
     */
    public function __construct($format = 'H:i:s')
    {
        $this->format($format)->start();
    }

    /**
     * @param string $format
     * @return $this
     */
    protected function format($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * Start the timer.
     *
     * @return $this
     */
    public function start()
    {
        $this->start = microtime(true);
        return $this;
    }

    /**
     * Stop the timer.
     *
     * @return $this
     */
    public function stop()
    {
        $this->stop = microtime(true);
        return $this;
    }

    /**
     * Return the current time of the timer.
     *
     * @return string
     */
    public function time()
    {
        $time = round($this->stop - $this->start, 3);
        $ms = substr(number_format($time - floor($time), 3), 1);

        return gmdate($this->format, $time) . $ms;
    }

    /**
     * Stop the timer and show the current time of it.
     *
     * @return string
     */
    public function end()
    {
        return $this->stop()->time();
    }
}