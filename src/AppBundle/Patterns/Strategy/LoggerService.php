<?php

namespace AppBundle\Patterns\Strategy;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class LoggerService
 * @package AppBundle\Patterns\Strategy
 */
class LoggerService
{

    /**
     * @var array
     */
    private $loggers;

    /**
     * LoggerService constructor.
     */
    public function __construct()
    {
        $this->loggers = new ArrayCollection();
    }

    /**
     * @param Logger $logger
     * @param string $slug
     */
    public function addLogger(Logger $logger, string $slug) : void
    {
        $this->loggers->set($slug, $logger);
    }

    /**
     * @param $data
     * @param string $slug
     */
    public function log($data, string $slug = null) : void
    {
        $slug = $slug ?: 'file';

        $this->loggers[$slug]->log($data);
    }
}