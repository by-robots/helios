<?php namespace Helios;

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
        $container       = require_once __DIR__ . '/../Config/Modules.php';
        $this->output    = $container->get('Helios\Modules\Output\Output');
        $this->input     = $container->get('Helios\Modules\Input\Input');
        $this->storage   = $container->get('Helios\Modules\Storage\Storage');
        $this->setup     = $container->get('Helios\Modules\Setup');
        $this->weather   = $container->get('Helios\Modules\Weather\Weather');
        $this->sentiment = $container->get('Helios\Modules\NLP\Sentiment\Sentiment');
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

                case 'weather':
                case 'Weather':
                    $temperature = $this->weather->currentTemperature();
                    $this->output->write('The temperature is ' . $temperature . '.');
                    break;

                default:
                    $this->output->write('I believe that is ' . $this->sentiment->check($input));
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
