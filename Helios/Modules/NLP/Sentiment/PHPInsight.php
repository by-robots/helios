<?php namespace Helios\Modules\NLP\Sentiment;

/**
 * PHPInsight implementation.
 */
class PHPInsight implements Sentiment
{
    /**
     * The sentiment analyser.
     *
     * @var PHPInsight\Sentiment
     */
    protected $analyser;

    /**
     * Set-up.
     *
     * @return void
     */
    public function __construct()
    {
        $this->analyser = new \PHPInsight\Sentiment;
    }

    /**
     * Take a string and return it's sentiment.
     *
     * @param string $text
     *
     * @return string POSITIVE|NEUTRAL|NEGATIVE
     */
    public function check($text)
    {
        $score = $this->analyser->score($text);
        $class = $this->analyser->categorise($text);

        switch ($class) {
            case 'pos':
                return 'POSITIVE';

            case 'neg':
                return 'NEGATIVE';

            default:
                return 'NEUTRAL';
        }
    }
}
