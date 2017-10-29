<?php

namespace Helios\Modules\Interpret;

interface Interpret
{
    /**
     * Attempt to interpret a parsed sentence.
     *
     * @param array $sentence
     *
     * @return Helios\Modules\Actions\Action
     */
    public function try(array $sentence);
}
