<?php

namespace Helios\Modules\Actions;

/**
 * Actions are classes that can be used at the users request. An action may
 * retrieve weather, get the next event in a calendar or send an email.
 */
interface Action
{
    /**
     * Run the action. This method should return nothing, but it may output or
     * write to storage (etc.) as necessary.
     *
     * @return void
     */
    public function act();
}
