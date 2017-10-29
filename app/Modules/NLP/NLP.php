<?php

namespace App\Modules\NLP;

/**
 * Define a set of methods an input class must implement in order to be used
 * by Helios interchangeably.
 */
interface NLP
{
    /**
     * Process a sentence.
     *
     * @param string $sentence
     *
     * @return array
     */
    public function parseSentence($sentence);
}
