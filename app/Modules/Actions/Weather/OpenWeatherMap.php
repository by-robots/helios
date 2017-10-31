<?php

namespace App\Modules\Actions\Weather;

use App\Modules\Actions\Action;
use App\Modules\Output\Output;
use App\Modules\Storage\Storage;
use Cmfcmf\OpenWeatherMap as Service;

class OpenWeatherMap implements Action, Weather
{
    /**
     * For outward communication.
     *
     * @var App\Modules\Output\Output
     */
    public $output;

    /**
     * For inward communication.
     *
     * @var App\Modules\Input\Input
     */
    public $input;

    /**
     * Helios' storage.
     *
     * @var App\Modules\Storage\Storage
     */
    public $storage;

    /**
     * Set-up everything we need.
     *
     * @param App\Modules\Output\Output   $output
     * @param App\Modules\Storage\Storage $storage
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
     * @return void
     */
    public function weatherNow($location)
    {
        $service = new Service(env('OPEN_WEATHER_MAP_API'));

        try {
            $weather = $service->getWeather($location, 'metric', 'en');
        } catch(\Exception $e) {
            $this->output->write('Error: ' . $e->getMessage(), 'error');
            return;
        }

        $this->output->write($weather->temperature->getValue() . ' Celcius, ' .
            $weather->weather->description . '.');
    }

    /**
     * Repond to an action request.
     *
     * @return void
     */
    public function act()
    {
        try {
            $location = $this->storage->get('user.location');
        } catch (\Exception $e) {
            $this->output->write('No location available. Defaulting to London, UK.');
            $location = 'london';
        }

        $this->weatherNow($location);
    }
}
