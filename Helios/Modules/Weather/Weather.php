<?php namespace Helios\Modules\Weather;

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
}
