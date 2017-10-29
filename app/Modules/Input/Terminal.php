<?php

namespace App\Modules\Input;

use App\Modules\Output\Output;

class Terminal implements Input
{
    /**
     * Request information from the user.
     *
     * @param string $text
     *
     * @return string
     */
    public function request($text)
    {
        app(Output::class)->write($text, 'question');
        return trim(fgets(STDIN));
    }
}
