<?php

namespace App\Modules\DanHub;

use Gitlab\ResultPager;
use Vinkla\GitLab\GitLabManager;

class API implements DanHub
{
    /**
     * The connection to the API.
     *
     * @var Vinkla\GitLab\GitLabManager
     */
    private $gitlab;

    /**
     * Set-up the client.
     *
     * @param Vinkla\GitLab\GitLabManager $gitlab
     *
     * @return void
     */
    public function __construct(GitLabManager $gitlab)
    {
        $this->gitlab = $gitlab;
        $this->pager  = new ResultPager($this->gitlab->connection());
    }

    /**
     * Get all projects.
     *
     * @return array
     */
    public function listProjects()
    {
        return $this->pager->fetchall($this->gitlab->api('projects'), 'all');
    }
}
