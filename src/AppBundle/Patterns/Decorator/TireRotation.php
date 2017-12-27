<?php

namespace AppBundle\Patterns\Decorator;

/**
 * Class TireRotation
 * @package AppBundle\Patterns\Decorator
 */
class TireRotation implements CarService
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
        return 15 + $this->carService->getCost();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->carService->getDescription() . ', and a tire rotation';
    }
}