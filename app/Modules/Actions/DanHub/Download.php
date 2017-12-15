<?php

namespace App\Modules\Actions\DanHub;

use App\Modules\Actions\Action;
use App\Modules\Output\Output;
use Cmfcmf\OpenWeatherMap as Service;

class Download implements Action
{
    /**
     * Repond to an action request.
     *
     * @return void
     */
    public function act()
    {
        app(Output::class)->write('This will take a while...');
        foreach (config('danhub.list') as $name => $repo) {
            $this->_fetch($name, $repo);
        }
    }

    /**
     * Fetches a repo.
     *
     * TODO: Uses shell_exec. This is obviously bad.
     *
     * @param string $name
     * @param string $repo
     *
     * @return void
     */
    private function _fetch($name, $repo)
    {
        if (file_exists(config('danhub.storage') . '/' . $name)) {
            // Just update what we have
            app(Output::class)->write('Updating ' . $name);
            shell_exec('cd ' . config('danhub.storage') . '/' . $name . ' && git remote update');
            return;
        }

        app(Output::class)->write('Cloning ' . $name);
        shell_exec('cd ' . config('danhub.storage') . ' && git clone --mirror ' . $repo . ' ' . $name);
        return;
    }
}
