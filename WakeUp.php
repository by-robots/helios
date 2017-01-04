<?php

/**
 * Check that we have the necessary dependencies, if we do load them.
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    throw new Exception('MISSING_DEPENDENCIES');
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
 * Load in Helios.
 */
if (!class_exists('\\Helios\\Helios')) {
    throw new Exception('HELIOS_NOT_FOUND');
}

$helios = new Helios\Helios;
$helios->wakeUp();
