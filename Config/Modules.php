<?php

/**
 * Not a config file like the others. Registers our modules.
 */
$container = new League\Container\Container;

// For outputting.
$container->add('Helios\Modules\Output\Output', new Helios\Modules\Output\Terminal);

// For getting input.
$container->add('Helios\Modules\Input\Input', new Helios\Modules\Input\Terminal);

// For remembering.
$container->add('Helios\Modules\Storage\Storage', new Helios\Modules\Storage\Json);

// For setting up
$container->add('Helios\Modules\Setup')
    ->withArgument('Helios\Modules\Output\Output')
    ->withArgument('Helios\Modules\Input\Input')
    ->withArgument('Helios\Modules\Storage\Storage');

// NLP
$container->add('Helios\Modules\NLP\NLP', new Helios\Modules\NLP\Stanford);

/**
 * Return the container for use in the Helios\Modules\Modules class.
 */
return $container;
