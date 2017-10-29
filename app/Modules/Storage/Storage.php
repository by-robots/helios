<?php

namespace Helios\Modules\Storage;

/**
 * Describes a consistent storage implementation.
 */
interface Storage
{
    /**
     * Write a key value pair to the storage medium. Should create if the key
     * doesn't exist or update if it does.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function set($key, $value);

    /**
     * Retrieve a value based on it's key.
     *
     * @param string $key
     *
     * @return mixed
     * @throws Exception
     */
    public function get($key);
}
