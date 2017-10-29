<?php

namespace App\Modules\NLP;

use StanfordTagger\POSTagger;

class Stanford implements NLP
{
    /**
     * Object for parsing the input.
     *
     * @var StanfordTagger\POSTagger;
     */
    protected $parser;

    /**
     * Set-up the class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parser = new POSTagger;
        $this->parser->setModel(__DIR__ . '/../../../Programs/stanford-postagger-2017-06-09/models/english-bidirectional-distsim.tagger');
        $this->parser->setJarArchive(__DIR__ . '/../../../Programs/stanford-postagger-2017-06-09/stanford-postagger.jar');
    }

    /**
     * Process a sentence.
     *
     * @param string $sentence
     *
     * @return array
     */
    public function parseSentence($sentence)
    {
        // The result will contain words Penn Part of Speech Tags.
        // A key is available here: https://cs.nyu.edu/grishman/jet/guide/PennPOS.html
        $result = $this->parser->tag($sentence);
        return $this->_toArray($result);
    }

    /**
     * Convert the parsed sentence into an array. The software itself is capable
     * of doing this itself, however it's a bit more detailed than what I'm
     * able to work with at the moment. One for later.
     *
     * For now what we do is take the first verb (think get, set, etc.) and noun
     * and return those for interpretation.
     *
     * Example inputs would be "get weather", "set name", "show calendar".
     *
     * @param string $parsed
     *
     * @return array
     */
    private function _toArray($parsed)
    {
        $array = [];
        $words = explode(' ', $parsed);
        foreach ($words as $word) {
            $word    = explode('_', $word);
            $PoSType = substr($word[1], 0, 2);

            switch ($PoSType) {
                case 'NN':
                case 'VB':
                    if (!isset($array[$PoSType])) {
                        $array[$PoSType] = $word[0];
                    }
            }
        }

        return $array;
    }
}
