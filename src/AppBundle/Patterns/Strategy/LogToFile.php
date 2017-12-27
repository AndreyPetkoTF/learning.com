<?php

namespace AppBundle\Patterns\Strategy;

/**
 * Class LogToFile
 * @package AppBundle\Patterns\Strategy
 */
class LogToFile implements Logger
{

    /**
     * @param $data
     */
    public function log($data) : void
    {
        var_dump('log the data to a file');
    }
}