<?php namespace Helios;

/**
 * Helios' brain. Responsible for managing the AI.
 */
class Helios
{
    /**
     * For outward communication.
     *
     * @var Helios\Modules\Output\Output
     */
    protected $output;

    /**
     * Set-up Helios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->output = new \Helios\Modules\Output\Terminal;
    }

    /**
     * Wake up.
     *
     * @return void
     */
    public function wakeUp()
    {
        $this->output->write('I am awake.');
    }
}
