<?php namespace Helios\Modules\NLP\Sentiment;

/**
 * For retrieving the sentiment of a given string of text.
 */
interface Sentiment
{
    /**
     * Take a string and return it's sentiment.
     *
     * @param string $text
     *
     * @return string POSITIVE|NEUTRAL|NEGATIVE
     */
    public function check($text);
}
