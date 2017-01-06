<?php namespace Helios\Modules\ResponseBuilders;

/**
 * For building friendly responses to input data.
 */
interface Response
{
    /**
     * Build the response. Could be a string or, more likely, an object.
     *
     * @param mixed $input
     *
     * @return string
     */
    public function respond($input);
}
