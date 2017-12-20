<?php

namespace Tests\Modules;

use TestCase;
use App\Modules\Output\Output;

class DebuggingTest extends TestCase
{
    /**
     * When debugging is turned on the message passed to the message() method
     * should be output.
     */
    public function testOutputsWhenActive()
    {
        // Set-up our output mock
        $message = $this->faker->sentence();
        $output  = \Mockery::mock(Output::class);
        $output->shouldReceive('write')->with($message, 'comment')->once();

        // Add the mock to the container
        $this->app->singleton(OutputContract::class, $output);

        // Enable debugging
        app('debug')->toggle();

        // And test
        app('debug')->message($message);
    }

    /**
     * When debugging is turned off the message passed to message() should not
     * be output.
     */
    public function testDoesntOutputWhenInactive()
    {
        //
    }
}
