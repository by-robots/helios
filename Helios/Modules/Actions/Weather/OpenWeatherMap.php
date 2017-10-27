<?php

namespace Helios\Modules\Actions\Weather;

use Helios\Modules\Actions\Action;
use Helios\Modules\Output\Output;
use Helios\Modules\Storage\Storage;

class OpenWeatherMap implements Action, Weather
{
    /**
     * For outward communication.
     *
     * @var Helios\Modules\Output\Output
     */
    public $output;

    /**
     * For inward communication.
     *
     * @var Helios\Modules\Input\Input
     */
    public $input;

    /**
     * Helios' storage.
     *
     * @var Helios\Modules\Storage\Storage
     */
    public $storage;

    /**
     * Set-up everything we need.
     *
     * @param Helios\Modules\Output\Output   $output
     * @param Helios\Modules\Storage\Storage $storage
     *
     * @return void
     */
    public function __construct(Output $output, Storage $storage)
    {
        $this->output  = $output;
        $this->storage = $storage;
    }

    /**
     * Get the current weather of the given location.
     *
     * @param string $location
     *
     * @return string
     */
    public function weatherNow($location)
    {
        //
    }

    /**
     * Repond to an action request.
     */
    public function act()
    {
        //
    }
}
