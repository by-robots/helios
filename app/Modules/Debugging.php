<?php

namespace App\Modules;

use App\Modules\Output\Output;

class Debugging
{
    /**
     * Should debugging be shown?
     *
     * @var bool
     */
    private $debugging = false;

    /**
     * Toggle debugging.
     *
     * @return bool
     */
    public function toggle()
    {
        $this->debugging = !$this->debugging;
        return $this->debugging;
    }

    /**
     * Output a debug message.
     *
     * @param string $message
     *
     * @return void
     */
    public function message($message)
    {
        if (!$this->debugging) {
            return;
        }

        app(Output::class)->write($message, 'comment');
    }
}
