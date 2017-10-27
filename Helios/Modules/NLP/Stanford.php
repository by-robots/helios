<?php

namespace Helios\Modules\NLP;

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
        return $result;
    }
}
