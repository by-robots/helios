<?php namespace Helios;

/**
 * Helios' brain. Responsible for managing the AI.
 */
class Helios
{
    /**
     * Contains Helios' modules.
     *
     * @var Helios\Modules\Modules
     */
    private $modules;

    /**
     * Set-up Helios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->modules = new Modules\Modules;
    }

    /**
     * Wake up.
     *
     * @return void
     */
    public function wakeUp()
    {
        $this->modules->output->write('I am awake.');

        if ($this->modules->setup->shouldRun()) {
            $this->modules->output->write('Set-up should run.');
        }

        $this->commsLoop();
        $this->goToSleep();
    }

    /**
     * Start the communication loop.
     *
     * @return void
     */
    public function commsLoop()
    {
        while (($input = $this->modules->input->request('What can I do for you?')) != 'Goodbye') {
            $this->modules->output->write('I believe that is ' .
                $this->modules->sentiment->check($input));
        }
    }

    /**
     * Shut Helios down.
     *
     * @return void
     */
    public function goToSleep()
    {
        $this->modules->output->write('Goodbye.');
    }
}
