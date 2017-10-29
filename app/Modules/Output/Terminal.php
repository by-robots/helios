<?php

namespace App\Modules\Output;

use Symfony\Component\Console\Output\ConsoleOutput;

class Terminal implements Output
{
    /**
     * Contains the output class.
     *
     * @var Symfony\Component\Console\Output\ConsoleOutput
     */
    private $output;

    /**
     * Set-up.
     *
     * @return void
     */
    public function __construct()
    {
        $this->output = new ConsoleOutput;
    }

    /**
     * Write text to the Terminal.
     *
     * @param string $text
     * @param string $method
     *
     * @return void
     */
    public function write($text, $method = 'info')
    {
        $this->output->writeln("<$method>$text</$method>");
    }
}
