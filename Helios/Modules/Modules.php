<?php namespace Helios\Modules;

/**
 * Contains instances of all of the modules Helios is using. Allows for them to
 * be passed between other modules.
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
    }
}
