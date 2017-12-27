<?php

namespace AppBundle\Patterns\ChainOfResponsibility;

/**
 * Class HomeStatus
 * @package AppBundle\Patterns\ChainOfResponsibility
 */
class HomeStatus
{
    /**
     * @var bool
     */
    public $alarmOn = true;
    /**
     * @var bool
     */
    public $locked = true;
    /**
     * @var bool
     */
    public $lightOff = true;
}