<?php

namespace App\Modules\Interpret;

interface Interpret
{
    /**
     * Attempt to interpret a parsed sentence.
     *
     * @param array $sentence
     *
     * @return App\Modules\Actions\Action
     */
    public function try(array $sentence);
}
