<?php namespace Helios\Modules\ResponseBuilders;

class Weather implements Response
{
    /**
     * Build a friendly response about the current weather.
     *
     * @param mixed $input
     *
     * @return string
     */
    public function respond($input)
    {
        return $this->_temperature($input->temperature) .
            $this->_cloudCoverage($input->cloud_cover) .
            $this->_precipitation($input->precipitation);
    }

    /**
     * Return the string to use when describing the temperature.
     *
     * @param float $temperature
     *
     * @return string
     */
    private function _temperature($temperature)
    {
        // It's freezing
        $adjective = 'freezing';

        if (round($temperature) > 0) {
            $adjective = 'hot';

            if ($temperature < 10) {
                $adjective = 'cold';
            } elseif ($temperature < 17) {
                $adjective = 'cool';
            } elseif ($temperature < 22) {
                $adjective = 'warm';
            }
        } else if (round($temperature) < 0) {
            $adjective = 'too cold';
        }

        return 'It\'s ' . $adjective . ' out today, ';
    }

    /**
     * Cloud coverage string.
     *
     * @param float $cloudCoverage
     *
     * @return string
     */
    private function _cloudCoverage($cloudCoverage)
    {
        $cloudCoverage = round($cloudCoverage);
        $string        = 'and overcast';

        if ($cloudCoverage == 0) {
            $string = 'and there is literally not a cloud in the sky';
        } else if ($cloudCoverage < 25) {
            $string = 'not a lot of cloud';
        } else if ($cloudCoverage < 50) {
            $string = 'patchy clouds';
        }

        return $string . '. ';
    }

    /**
     * Precipiation string.
     *
     * @param float $precipitation
     *
     * @return string
     */
    private function _precipitation($precipitation)
    {
        $string = 'It\'s lashing it down.';

        if ($precipitation == 0) {
            $string = 'It\'s dry.';
        } else if ($precipitation < 25) {
            $string = 'Light rain.';
        } else if ($precipitation < 50) {
            $string = 'It\'s pretty soggy, you\'ll want an umbrella.';
        } else if ($precipitation < 75) {
            $string = 'Heavy rain, pack a coat.';
        }

        return $string;
    }
}
