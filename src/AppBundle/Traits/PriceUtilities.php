<?php

namespace AppBundle\Traits;

/**
 * Class PriceUtilities
 * @package AppBundle\Traits
 */
trait PriceUtilities
{
    /**
     * @param float $price
     * @return float|int
     */
    public function calculateTax(float $price)
    {
        return ($this->getTaxRate() / 100) * $price;
    }

    /**
     * Please create getter for tax rate in class
     * where you want to use me
     *
     * @return int
     */
    abstract function getTaxRate() : int;
}