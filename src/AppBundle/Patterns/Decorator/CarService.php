<?php

namespace AppBundle\Patterns\Decorator;


/**
 * Interface CarService
 * @package AppBundle\Patterns\Decorator
 */
interface CarService
{
    /**
     * @return int
     */
    public function getCost() : int;

    public function getDescription() : string;
}