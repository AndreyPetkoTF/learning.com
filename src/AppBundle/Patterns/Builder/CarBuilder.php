<?php

namespace AppBundle\Patterns\Builder;

use AppBundle\Patterns\Builder\Parts\Car;
use AppBundle\Patterns\Builder\Parts\Door;
use AppBundle\Patterns\Builder\Parts\Engine;
use AppBundle\Patterns\Builder\Parts\Wheel;

class CarBuilder implements BuilderInterface
{
    /**
     * @var Car
     */
    private $car;

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function addWheel()
    {
        $this->car->setPart('wheel1', new Wheel());
        $this->car->setPart('wheel2', new Wheel());
        $this->car->setPart('wheel3', new Wheel());
        $this->car->setPart('wheel4', new Wheel());
    }

    public function addEngine()
    {
        $this->car->setPart('engine', new Engine());
    }

    public function addDoors()
    {
        $this->car->setPart('door1', new Door());
        $this->car->setPart('door2', new Door());
    }

    public function getVehicle()
    {
        return $this->car;
    }
}