<?php

namespace Helios\Modules\Input;

class Terminal implements Input
{
    /**
     * Object for requesting input from the external user.
     *
     * @var League\CLImate\CLImate
     */
    protected $input;

    /**
     * Set-up the class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->input = new \League\CLImate\CLImate;
    }

    /**
     * Request information from the user.
     *
     * @param string $text
     *
     * @return void
     */
    public function request($text)
    {
        $input = $this->input->input($text);
        return $input->prompt();
    }
}
