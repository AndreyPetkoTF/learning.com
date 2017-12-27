<?php

namespace AppBundle\Patterns\Singleton;

/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 10/25/17
 * Time: 21:35
 */
class SingletonWithCounter
{
    /**
     * @var SingletonWithCounter
     */
    private static $entity = null;
    /**
     * @var int
     */
    private $callCount = 1;

    /**
     * SingletonWithCounter constructor.
     */
    private function __construct()
    {

    }

    /**
     *
     */
    private function __clone()
    {
        
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return SingletonWithCounter
     */
    public function getInstance()
    {
        if(!isset(static::$entity)) {
            static::$entity = new static();
        } else {
            static::$callCount++;
        }

        return static::$entity;
    }
}