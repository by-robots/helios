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
     * Link to Helios' storage.
     *
     * @var Helios\Modules\Storage\Storage
     */
    private $storage;

    /**
     * Set-up.
     *
     * @param Helios\Modules\Input\Input   $input
     * @param Helios\Modules\Output\Output $output
     *
     * @return void
     */
    public function __construct(
        \Helios\Modules\Input\Input $input,
        \Helios\Modules\Output\Output $output
    ) {
        $config        = new \Noodlehaus\Config(__DIR__ . '/../../../Config/APIKeys.php');
        $this->api     = new \Cmfcmf\OpenWeatherMap($config->get('OpenWeatherMap'));
        $this->output  = $output;
    }

    /**
     * Get the current temperature, rounded to nearest whole number.
     *
     * @return int
     */
    public function currentTemperature()
    {
        try {
            $weather = $this->api->getWeather('London', 'imperial', 'en');
        } catch (\Cmfcmf\OpenWeatherMap\Exception $e) {
            $this->output->write('Sorry, something went wrong: ' . $e->getMessage() . '(' . $e->getCode() . ')');
        } catch (\Exception $e) {
            $this->output->write('Sorry, something went wrong: ' . $e->getMessage() . '(' . $e->getCode() . ')');
        }

        return round($weather->temperature);
    }
}
