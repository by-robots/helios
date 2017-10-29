<?php

namespace App\Modules\Interpret;

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
            'get'  => [
                'weather' => app(Weather::class),
            ],
            'what' => [],
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
        //
    }
}
