<?php

namespace App\Console\Commands;

use App\Modules\Input\Input;
use App\Modules\Interpret\Interpret;
use App\Modules\NLP\NLP;
use App\Modules\Output\Output;
use App\Modules\Storage\Storage;
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
    protected $description = 'Starts Helios.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        app(Output::class)->write('Started.', 'comment');
        if (app('setup')->shouldRun()) {
            app('setup')->run();
        }

        app(Output::class)->write('Hello ' . app(Storage::class)->get('user.name') . '.');

        $this->_commsLoop();
        $this->_goToSleep();
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

    /**
     * Start the communication loop.
     *
     * @return void
     */
    private function _commsLoop()
    {
        while (true) {
            $input = app(Input::class)->request('>');

            switch ($input) {
                case 'goodbye':
                case 'Goodbye':
                    return;

                default:
                    $sentence = app(NLP::class)->parseSentence($input);

                    try {
                        $execute = app(Interpret::class)->try($sentence);
                    } catch (\Exception $e) {
                        app(Output::class)->write('No action available. ' .
                            'Input not understood or invalid.', 'error');
                    }

                    if (isset($execute)) {
                        $execute->act();
                        unset($execute);
                    }
            }
        }
    }

    /**
     * Shut Helios down.
     *
     * @return void
     */
    private function _goToSleep()
    {
        app(Output::class)->write('Closing.');
    }
}
