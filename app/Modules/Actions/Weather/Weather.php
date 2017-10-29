<?php

namespace App\Modules\Actions\Weather;

interface Weather
{
    /**
     * Get the current weather of the given location.
     *
     * @param string $location
     *
     * @return string
     */
    public function weatherNow($location);
}
