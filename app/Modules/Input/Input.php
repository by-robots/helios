<?php

namespace Helios\Modules\Input;

/**
 * Define a set of methods an input class must implement in order to be used
 * by Helios interchangeably.
 */
interface Input
{
    /**
     * Request input from the current user.
     *
     * @param string $text Prompt for the input.
     *
     * @return string The received response
     */
    public function request($text);
}
