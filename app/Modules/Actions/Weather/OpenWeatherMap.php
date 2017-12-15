<?php

namespace App\Modules\Actions\Weather;

use App\Modules\Actions\Action;
use App\Modules\Output\Output;
use App\Modules\Storage\Storage;
use Cmfcmf\OpenWeatherMap as Service;

class OpenWeatherMap implements Action, Weather
{
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
            app(Output::class)->write('Error: ' . $e->getMessage(), 'error');
            return;
        }

        app(Output::class)->write($weather->temperature->getValue() . ' Celcius, ' .
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
            $location = app(Storage::class)->get('user.location');
        } catch (\Exception $e) {
            app(Output::class)->write('No location available. Defaulting to London, UK.');
            $location = 'london';
        }

        $this->weatherNow($location);
    }
}
