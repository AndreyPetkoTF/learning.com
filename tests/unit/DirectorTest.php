<?php

namespace tests\codeception\unit;

use AppBundle\Patterns\Builder\CarBuilder;
use AppBundle\Patterns\Builder\Director;
use AppBundle\Patterns\Builder\Parts\Car;
use AppBundle\Patterns\Builder\Parts\Truck;
use AppBundle\Patterns\Builder\TruckBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 12/27/17
 * Time: 18:52
 */
class DirectorTest extends TestCase
{
    public function testCanBuildTrunk()
    {
        $truckBuilder = new TruckBuilder();
        $newVehicle = (new Director())->build($truckBuilder);

        $this->assertInstanceOf(Truck::class, $newVehicle);
    }

    public function testCatBuildCar()
    {
        $carBuilder = new CarBuilder();
        $newVehicle = (new Director())->build($carBuilder);

        $this->assertInstanceOf(Car::class, $newVehicle);
    }

}