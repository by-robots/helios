<?php namespace Helios\Modules\Output;

/**
 * Define a set of methods an output class must implement in order to be used
 * by the AI interchangeably.
 */
interface Output
{
    /**
     * Write to the output device (e.g. Terminal, Facebook Messenger).
     *
     * @param string $text
     *
     * @return void
     */
    public function write($text);
}
