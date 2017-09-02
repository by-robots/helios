<?php

namespace Helios\Modules\Weather;

/**
 * Define the weather interface.
 */
interface Weather
{
    /**
     * Get the current temperature, rounded to nearest whole number.
     *
     * @return int
     */
    public function currentTemperature();

    /**
     * Build an object containing information about the current weather. Keys
     * that should be included:
     *
     * - (float) temperature
     * - (float) wind_direction
     * - (float) wind_speed
     * - (float) cloud_cover
     * - (float) precipitation
     *
     * @return object
     */
    public function getWeatherObject();
}
