<?php

/**
 * Check that we have the necessary dependencies, if we do load them.
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    throw new Exception('Missing dependencies. Run composer install.');
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load our fancy error handler.
 */
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PlainTextHandler);
$whoops->register();

/**
 * Output so we know we're running.
 */
$climate = new League\CLImate\CLImate;
$climate->out('I am awake.');
