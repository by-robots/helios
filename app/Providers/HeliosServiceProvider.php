<?php

namespace App\Providers;

use App\Modules\Actions\Weather\OpenWeatherMap as WeatherProvider;
use App\Modules\Actions\Weather\Weather as WeatherContract;
use App\Modules\Input\Input as InputContract;
use App\Modules\Input\Terminal as InputProvider;
use App\Modules\Interpret\Interpret as InterpretContract;
use App\Modules\Interpret\Web as InterpretProvider;
use App\Modules\NLP\NLP as NLPContract;
use App\Modules\NLP\Stanford as NLPProvider;
use App\Modules\Output\Output as OutputContract;
use App\Modules\Output\Terminal as OutputProvider;
use App\Modules\Setup as SetupProvider;
use App\Modules\Storage\Json as StorageProvider;
use App\Modules\Storage\Storage as StorageContract;
use Illuminate\Support\ServiceProvider;

class HeliosServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // For inputting
        $this->app->singleton(InputContract::class, InputProvider::class);

        // For outputting
        $this->app->singleton(OutputContract::class, OutputProvider::class);

        // Storage
        $this->app->singleton(StorageContract::class, StorageProvider::class);

        // Set-up
        $this->app->singleton('setup', SetupProvider::class);

        // Natural Language Processing
        $this->app->singleton(NLPContract::class, NLPProvider::class);

        // Sentence Interpretation
        $this->app->singleton(InterpretContract::class, InterpretProvider::class);

        /** ********** ********** **********
         * Interpretation Actions
         * ********** ********** **********
         *
         * These are actions used when input is interpretted.
         */

        // Weather
        $this->app->singleton(WeatherContract::class, WeatherProvider::class);
    }
}
