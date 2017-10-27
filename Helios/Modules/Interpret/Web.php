<?php

namespace Helios\Modules\Interpret;

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
    public function __construct(Container $container)
    {
        $this->web = [
            'get'  => [
                'weather' => $container->get('Helios\Modules\Actions\Weather\Weather'),
            ],
            'what' => [],
        ];
    }
}
