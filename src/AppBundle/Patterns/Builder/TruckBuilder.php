<?php

namespace AppBundle\Patterns\Builder;

use AppBundle\Patterns\Builder\Parts\Door;
use AppBundle\Patterns\Builder\Parts\Engine;
use AppBundle\Patterns\Builder\Parts\Truck;
use AppBundle\Patterns\Builder\Parts\Vehicle;
use AppBundle\Patterns\Builder\Parts\Wheel;

class TruckBuilder implements BuilderInterface
{
    /**
     * @var Truck
     */
    private $truck;

    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function addDoors()
    {
        $this->truck->setPart('rightDoor', new Door());
        $this->truck->setPart('leftDoor', new Door());
    }

    public function addEngine()
    {
        $this->truck->setPart('truckEngine', new Engine());
    }

    public function addWheel()
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
    }

    public function getVehicle(): Vehicle
    {
        return $this->truck;
    }
}