<?php

namespace AppBundle\Patterns\Decorator;

/**
 * Class OilChange
 * @package AppBundle\Patterns\Decorator
 */
class OilChange implements CarService
{
    /**
     * @var CarService
     */
    protected $carService;

    /**
     * OilChange constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return 29 + $this->carService->getCost();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->carService->getDescription() . ', and oil change';
    }
}