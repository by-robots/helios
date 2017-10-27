<?php

namespace Helios\Modules\Actions;

/**
 * Actions are classes that can be used at the users request. An action may
 * retrieve weather, get the next event in a calendar or send an email.
 */
interface Actions
{
    /**
     * Run the action.
     *
     * @return void
     */
    public function act();
}
