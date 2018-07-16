<?php

namespace AppBundle\Patterns\Multiton;

class Multiton
{
    private static $instances = [];

    private function __construct()
    {
    }

    public static function getInstance(string $instanceName): Multiton
    {
        if(!isset(self::$instances[$instanceName])) {
            self::$instances[$instanceName] = new self();
        }

        return self::$instances[$instanceName];
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
