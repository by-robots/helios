<?php

namespace App\Modules\Interpret;

use App\Modules\Actions\Debugging;
use App\Modules\Actions\Weather\Weather;
use League\Container\Container;

/**
 * A very simplistic way of deriving meaning from user input.
 */
class Web implements Interpret
{
    /**
     * We'll use an associative array to link verbs to nouns to classes to
     * perform an action.
     *
     * @var $web
     */
    private $web;

    /**
     * Set-up the web.
     *
     * @return void.
     */
    public function __construct()
    {
        $this->web = [
            'get' => [
                'weather' => app(Weather::class),
            ],
            'toggle' => [
                'debug' => new Debugging,
            ]
        ];
    }

    /**
     * Decide how to act upon a sentence.
     *
     * @param array $sentence
     *
     * @return App\Modules\Action\Action
     */
    public function try(array $sentence)
    {
        if (!isset($sentence['VB']) or !isset($sentence['NN'])) {
            throw new \Exception('SENTENCE_INCOMPLETE');
        }

        if (!isset($this->web[$sentence['VB']][$sentence['NN']])) {
            throw new \Exception('NO_ACTION');
        }

        return $this->web[$sentence['VB']][$sentence['NN']];
    }
}
