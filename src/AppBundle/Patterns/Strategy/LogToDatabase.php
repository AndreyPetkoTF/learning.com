<?php

namespace AppBundle\Patterns\Strategy;

/**
 * Class LogToDatabase
 * @package AppBundle\Patterns\Strategy
 */
class LogToDatabase implements Logger
{

    /**
     * @param $data
     */
    public function log($data) : void
    {
        var_dump('log the data to a database');
    }
}