<?php

/**
 * Not a config file like the others. Registers our modules.
 */
$container = new League\Container\Container;

// For outputting.
$container->add('Helios\Modules\Output\Output', new \Helios\Modules\Output\Terminal);

// For getting input.
$container->add('Helios\Modules\Input\Input', new \Helios\Modules\Input\Terminal);

// For remembering.
$container->add('Helios\Modules\Storage\Storage', new \Helios\Modules\Storage\Json);

// For setting up
$container->add('Helios\Modules\Setup')
    ->withArgument('Helios\Modules\Output\Output')
    ->withArgument('Helios\Modules\Input\Input')
    ->withArgument('Helios\Modules\Storage\Storage');

// For the weather.
$container->add('Helios\Modules\Weather\Weather', 'Helios\Modules\Weather\OpenWeatherMap')
    ->withArgument('Helios\Modules\Input\Input')
    ->withArgument('Helios\Modules\Output\Output');

// For sentiment analysis.
$container->add('Helios\Modules\NLP\Sentiment\Sentiment', new \Helios\Modules\NLP\Sentiment\PHPInsight);

/**
 * Return the container for use in the Helios\Modules\Modules class.
 */
return $container;
