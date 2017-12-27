<?php

namespace AppBundle\Patterns\Decorator;

/**
 * Class BasicInspection
 * @package AppBundle\Patterns\Decorator
 */
class BasicInspection implements CarService
{
    /**
     * @return int
     */
    public function getCost() : int
    {
        return 19;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Basic inspection';
    }
}