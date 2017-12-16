<?php

namespace App\Modules\DanHub;

/**
 * Define a set of methods a class for working with DanHub must implement.
 */
interface DanHub
{
    /**
     * Get all projects.
     *
     * @return array
     */
    public function listProjects();
}
