<?php namespace Helios\Modules\Storage;

class Json implements Storage
{
    /**
     * Path to the Json file.
     *
     * @var string
     */
    private $file = __DIR__ . '/../../../Storage/Memory.json';

    /**
     * Set-up.
     *
     * @return void
     */
    public function __construct()
    {
        if (!file_exists($this->file)) {
            $this->_write([]);
        }
    }

    /**
     * Write a key value pair to the storage medium. Should create if the key
     * doesn't exist or update if it does.
     *
     * @param string $key
     * @param string $value
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function set($key, $value)
    {
        //
    }

    /**
     * Retrieve a value based on it's key.
     *
     * @param string $key
     *
     * @return string
     * @throws Exception
     */
    public function get($key)
    {
        //
    }

    /**
     * Open the file.
     *
     * @return array
     */
    private function _open()
    {
        $file = file_get_contents($this->file);
        return json_decode($file);
    }

    /**
     * Write the file.
     *
     * @param string $contents
     *
     * @return void
     */
    private function _write($contents)
    {
        file_put_contents($this->file, json_encode($contents));
    }
}
