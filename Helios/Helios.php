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
     * Analyse a statement's sentiment.
     *
     * @var Helios\Modules\NLP\Sentiment\Sentiment
     */
    protected $sentiment;

    /**
     * Set-up Helios.
     *
     * @return void
     */
    public function __construct()
    {
        $this->output    = new \Helios\Modules\Output\Terminal;
        $this->input     = new \Helios\Modules\Input\Terminal;
        $this->sentiment = new \Helios\Modules\NLP\Sentiment\PHPInsight;
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
        while (($input = $this->input->request('What can I do for you?')) != 'Goodbye') {
            $this->output->write('You said: ' . $input);
            $this->output->write('I believe that is ' . $this->sentiment->check($input));
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
