<?php

// ********** The Container
// Holds our modules, making them available elsewhere and allowing us to swap
// out modules for new versions without having to re-write big chunks of code.
$container = new League\Container\Container;

// ********** The Modules
// Top level, general use modules used throughout Helios.

// Output
$container->add('Helios\Modules\Output\Output', new Helios\Modules\Output\Terminal);

// Input
$container->add('Helios\Modules\Input\Input', new Helios\Modules\Input\Terminal);

// Persistent Memory
$container->add('Helios\Modules\Storage\Storage', new Helios\Modules\Storage\Json);

// Set-up
$container->add('Helios\Modules\Setup')
    ->withArgument('Helios\Modules\Output\Output')
    ->withArgument('Helios\Modules\Input\Input')
    ->withArgument('Helios\Modules\Storage\Storage');

// NLP
$container->add('Helios\Modules\NLP\NLP', new Helios\Modules\NLP\Stanford);

// ********** Actions
// Allows Helios to perform pre-defined actions. Used in conjuction with NLP
// and the interpretation (below).
$container->add(
    'Helios\Modules\Actions\Weather\Weather',
    new Helios\Modules\Actions\Weather\OpenWeatherMap(
        $container->get('Helios\Modules\Output\Output'),
        $container->get('Helios\Modules\Storage\Storage')
    )
);

// ********** Interpretation.
// This should be the last item added as it requires access to the container.
$container->add('Helios\Modules\Interpret\Interpret', new Helios\Modules\Interpret\Web($container));

/**
 * Return the container for use in the Helios\Modules\Modules class.
 */
return $container;
