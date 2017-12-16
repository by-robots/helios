<?php

namespace App\Modules\Actions\DanHub;

use App\Modules\Actions\Action;
use App\Modules\Output\Output;
use App\Modules\DanHub\DanHub;
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
        app(Output::class)->write('Retrieving repositories. Please wait.');
        $repos = app(DanHub::class)->listProjects();

        app(Output::class)->write('Retrieved ' . count($repos) . ' repositories.');
        foreach ($repos as $repo) {
            $this->_fetch($repo['name'], $repo['ssh_url_to_repo']);
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
        if (file_exists(config('gitlab.storage') . '/' . $name)) {
            // Just update what we have
            app(Output::class)->write('Updating ' . $name);
            shell_exec('cd ' . config('gitlab.storage') . '/' . $name . ' && git remote update');
            return;
        }

        app(Output::class)->write('Cloning ' . $name);
        shell_exec('cd ' . config('gitlab.storage') . ' && git clone --mirror ' . $repo . ' ' . $name);
        return;
    }
}
