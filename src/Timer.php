<?php

namespace Isswp101\Timer;

class Timer
{
    /**
     * @var double
     */
    private $start;

    /**
     * @var double
     */
    private $time;

    /**
     * @var string
     */
    private $format;

    /**
     * Create a new Timer instance and start it.
     *
     * @param string $format
     */
    public function __construct($format = 'H:i:s.ms')
    {
        $this->format($format)->start();
    }

    /**
     * Set the date format.
     *
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
        $this->time += microtime(true) - $this->start;
        return $this;
    }

    /**
     * Reset the timer.
     *
     * @return $this
     */
    public function reset()
    {
        $this->time = 0.0;
        $this->start();
        return $this;
    }

    /**
     * Return measured time.
     *
     * @return string
     */
    public function time()
    {
        $format = $this->format;

        $format = $this->replace('u', 6, $format);

        $format = $this->replace('ms', 3, $format);

        return gmdate($format, $this->time);
    }

    /**
     * Replace the date format with calculated values.
     *
     * @param string $pattern
     * @param int $precision
     * @param string $format
     * @return string
     */
    private function replace($pattern, $precision, $format)
    {
        $time = round($this->time, $precision);
        $value = substr(number_format($time - floor($time), $precision), 2);
        return str_replace($pattern, $value, $format);
    }

    /**
     * Stop the timer and return measured time.
     *
     * @return string
     */
    public function end()
    {
        return $this->stop()->time();
    }
}
