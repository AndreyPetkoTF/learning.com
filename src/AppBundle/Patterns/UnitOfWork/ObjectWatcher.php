<?php
declare(strict_types=1);

namespace AppBundle\Patterns\UnitOfWork;

class ObjectWatcher
{
    private $all    = [];
    private $dirty  = [];
    private $new    = [];
    private $delete = [];

    private static $instance;

//    static function addDelete(DomainObject $object)
//    {
//        $self = self::instance();
//    }

    public static function addDirty(DomainObject $object)
    {
        $instance = self::instance();

        if (!in_array($object, $instance->new, true)) {
            $instance->dirty[$instance->globalKey($object)] = $object;
        }
    }

    public static function addNew(DomainObject $object)
    {
        $instance = self::instance();

        $instance->new[] = $object;
    }

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
