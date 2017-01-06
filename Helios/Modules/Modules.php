<?php namespace Helios\Modules;

/**
 * Contains instances of all of the modules Helios is using.
 */
class Modules
{
    /**
     * For outward communication.
     *
     * @var Helios\Modules\Output\Output
     */
    public $output;

    /**
     * For inward communication.
     *
     * @var Helios\Modules\Input\Input
     */
    public $input;

    /**
     * Helios' storage.
     *
     * @var Helios\Modules\Storage\Storage
     */
    public $storage;

    /**
     * For setting up Helios when it has no memory stored.
     *
     * @var Helios\Modules\Setup\Setup
     */
    public $setup;

    /**
     * Analyse a statement's sentiment.
     *
     * @var Helios\Modules\NLP\Sentiment\Sentiment
     */
    public $sentiment;

    public function __construct()
    {
        // Load the modules config and set-up with the set options
        $config = new \Noodlehaus\Config(__DIR__ . '/../../Config/Modules.php');

        $this->output    = $config->get('Output');
        $this->input     = $config->get('Input');
        $this->storage   = $config->get('Storage');
        $this->sentiment = $config->get('Sentiment');
        $this->setup     = new \Helios\Modules\Setup\Setup($this->output, $this->input, $this->storage);
    }
}
