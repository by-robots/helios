<?php namespace Helios\Modules\Output;

class Terminal implements Output
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
    public function __construct()
    {
        $this->output = new \League\CLImate\CLImate;
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
