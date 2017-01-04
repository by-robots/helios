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
     * For inward communication.
     *
     * @var Helios\Modules\Input\Input
     */
    protected $input;

    /**
     * Set-up Helios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->output = new \Helios\Modules\Output\Terminal;
        $this->input  = new \Helios\Modules\Input\Terminal;
    }

    /**
     * Wake up.
     *
     * @return void
     */
    public function wakeUp()
    {
        $this->output->write('I am awake.');
        $this->commsLoop();
        $this->goToSleep();
        exit;
    }

    /**
     * Start the communication loop.
     *
     * @return void
     */
    public function commsLoop()
    {
        do {
            $input = $this->input->request('What can I do for you?');
            $this->output->write('You said: ' . $input);

        } while ($input != 'Goodbye');
    }

    /**
     * Shut Helios down.
     *
     * @return void
     */
    public function goToSleep()
    {
        $this->output->write('Goodbye.');
    }
}
