<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class Helios extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'helios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Helios.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        //
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
