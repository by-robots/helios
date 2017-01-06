<?php namespace Helios\Modules\Weather;

/**
 * Define the weather interface.
 */
class OpenWeatherMap implements Weather
{
    /**
     * Link to the API.
     *
     * @var Cmfcmf\OpenWeatherMap
     */
    private $api;

    /**
     * Link to the output device.
     *
     * @var Helios\Modules\Output\Output
     */
    private $output;

    /**
     * Set-up.
     *
     * @param Helios\Modules\Output\Output $output
     *
     * @return void
     */
    public function __construct(\Helios\Modules\Output\Output $output)
    {
        $config        = new \Noodlehaus\Config(__DIR__ . '/../../../Config/APIKeys.php');
        $this->api     = new \Cmfcmf\OpenWeatherMap($config->get('OpenWeatherMap'));
        $this->output  = $output;
    }

    /**
     * Get the current temperature, rounded to nearest whole number.
     *
     * @return float
     */
    public function currentTemperature()
    {
        $weather = $this->_makeRequest();
        return $weather->temperature->getValue();
    }

    /**
     * Build an object containing information about the current weather. Keys
     * that should be included:
     *
     * - (float) temperature
     * - (float) wind_direction
     * - (float) wind_speed
     * - (float) cloud_cover
     * - (bool)  precipitation
     *
     * @return object
     */
    public function getWeatherObject()
    {
        $weather = $this->_makeRequest();

        $object                 = new \stdClass;
        $object->temperature    = $weather->temperature->getValue();
        $object->wind_direction = $weather->wind->direction->getValue();
        $object->wind_speed     = $weather->wind->speed->getValue();
        $object->cloud_cover    = $weather->clouds->getValue();
        $object->precipitation  = $weather->precipitation->getValue() == 'no' ? false : true;

        return $object;
    }

    /**
     * Make the request to the API.
     *
     * @return Cmfcmf\OpenWeatherMap\CurrentWeather
     */
    private function _makeRequest()
    {
        try {
            $weather = $this->api->getWeather('London', 'metric', 'en');
        } catch (\Cmfcmf\OpenWeatherMap\Exception $e) {
            $this->output->write('Sorry, something went wrong: ' . $e->getMessage() . '(' . $e->getCode() . ')');
        } catch (\Exception $e) {
            $this->output->write('Sorry, something went wrong: ' . $e->getMessage() . '(' . $e->getCode() . ')');
        }

        return $weather;
    }
}
