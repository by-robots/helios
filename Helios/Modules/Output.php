<?php namespace Helios\Modules;

/**
 * Manage outward communication.
 */
class Output
{
    /**
     * Object for writing to the Terminal.
     *
     * @var League\CLImate\CLImate
     */
    protected $output;

    /**
     * Set-up the class.
     *
     * @return void
     */
    public function __construct($output = null)
    {
        $this->output = !$output ? new \League\CLImate\CLImate : $output;
    }

    /**
     * Write text to the Terminal.
     *
     * @param string $text
     *
     * @return void
     */
    public function write($text)
    {
        $this->output->out($text);
    }
}
