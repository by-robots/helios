<?php

/**
 * Specify which classes to use for which modules.
 *
 * @var array
 */
return [
    'Output'    => new \Helios\Modules\Output\Terminal,
    'Input'     => new \Helios\Modules\Input\Terminal,
    'Storage'   => new \Helios\Modules\Storage\Json,
    'Weather'   => new \Helios\Modules\Weather\OpenWeatherMap,
    'Sentiment' => new \Helios\Modules\NLP\Sentiment\PHPInsight,
];
