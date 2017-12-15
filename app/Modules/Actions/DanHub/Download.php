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
    }
}
