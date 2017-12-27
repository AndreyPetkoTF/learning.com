<?php

namespace AppBundle\Closures;


/**
 * Class ClosureProduct
 * @package AppBundle\Closures
 */
class ClosureProduct
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $price;

    /**
     * ClosureProduct constructor.
     * @param $name
     * @param $price
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}