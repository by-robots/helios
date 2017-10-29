<?php

namespace App\Modules;

use App\Modules\Input\Input;
use App\Modules\Storage\Storage;

/**
 * Gettin' to know you,
 * Gettin' to know all about you.
 */
class Setup
{
    /**
     * Should set-up be run?
     *
     * @return BOOL
     */
    public function shouldRun()
    {
        try {
            app(Storage::class)->get('user.name');
        } catch (\Exception $e) {
            return true;
        }

        return false;
    }

    /**
     * Do the set-up.
     *
     * @return void
     */
    public function run()
    {
        app(Storage::class)->set(
            'user.name',
            app(Input::class)->request('Hello. What should I call you?')
        );
    }
}
