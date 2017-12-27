<?php

namespace AppBundle\LateStaticBinding;

/**
 * Class DomainObject
 * @package AppBundle\LateStaticBinding
 */
abstract class DomainObject
{
    /**
     * @var
     */
    private $group;

    /**
     * DomainObject constructor.
     */
    public function __construct()
    {
        /**
         * if you use self all group
         * will be "default" because
         * call in DomainObject class
         */
        $this->group = static::getGroup();
    }

    /**
     * @return static
     */
    public static function create()
    {
        /**
         * if use "self" you have try to create "DomainObject"
         * when you call it from child class, but with static
         * you create object of child class.
         */
        return new static();
    }

    /**
     * @return string
     */
    public static function getGroup()
    {
        return 'default';
    }
}