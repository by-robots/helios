<?php

namespace App\Modules\Actions;

/**
 * Actions are classes that can be used at the users request. An action may
 * retrieve weather, get the next event in a calendar or send an email.
 */
class Debugging implements Action
{
    /**
     * Toggle the current debugging status.
     *
     * @return void
     */
    public function act()
    {
        app('debug')->toggle();
    }
}
