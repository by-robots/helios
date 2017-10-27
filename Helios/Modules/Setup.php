<?php

namespace Helios\Modules;

/**
 * Gettin' to know you,
 * Gettin' to know all about you.
 */
class Setup
{
    /**
     * For outward communication.
     *
     * @var Helios\Modules\Output\Output
     */
    public $output;

    /**
     * For inward communication.
     *
     * @var Helios\Modules\Input\Input
     */
    public $input;

    /**
     * Helios' storage.
     *
     * @var Helios\Modules\Storage\Storage
     */
    public $storage;

    /**
     * Set-up Setup.
     *
     * @param Helios\Modules\Output\Output   $output
     * @param Helios\Modules\Input\Input     $input
     * @param Helios\Modules\Storage\Storage $storage
     *
     * @return void
     */
    public function __construct(
        \Helios\Modules\Output\Output $output,
        \Helios\Modules\Input\Input $input,
        \Helios\Modules\Storage\Storage $storage
    ) {
        $this->output  = $output;
        $this->input   = $input;
        $this->storage = $storage;
    }

    /**
     * Should set-up be run?
     *
     * @return BOOL
     */
    public function shouldRun()
    {
        try {
            $this->storage->get('user.name');
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
        $this->storage->set(
            'user.name',
            $this->input->request('Hello. What should I call you?')
        );
    }
}
