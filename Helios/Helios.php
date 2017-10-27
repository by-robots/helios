<?php

namespace Helios;

use Helios\Modules\ResponseBuilders\Weather as WeatherResponse;

/**
 * Helios' brain. Responsible for managing the AI.
 */
class Helios
{
    /**
     * Set-up Helios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->container = require_once __DIR__ . '/../Config/Modules.php';
        $this->output    = $this->container->get('Helios\Modules\Output\Output');
        $this->input     = $this->container->get('Helios\Modules\Input\Input');
        $this->storage   = $this->container->get('Helios\Modules\Storage\Storage');
        $this->setup     = $this->container->get('Helios\Modules\Setup');
    }

    /**
     * Wake up.
     *
     * @return void
     */
    public function wakeUp()
    {
        $this->output->write('I am awake.');

        // Do we need to run Helios' set-up?
        if ($this->setup->shouldRun()) {
            $this->setup->run();
        }

        $this->output->write('Hello, ' . $this->storage->get('user.name') . '.');

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
        while (true) {
            $input = $this->input->request('What can I do for you?');

            switch ($input) {
                case 'goodbye':
                case 'Goodbye':
                    return;

                default:
                    $this->output->write('TO-DO!');
            }
        }
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
