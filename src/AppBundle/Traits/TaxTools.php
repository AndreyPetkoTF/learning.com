<?php

namespace AppBundle\Traits;

/**
 * Class TaxTools
 * @package AppBundle\Traits
 */
trait TaxTools
{
    public function calculateTax(float $price)
    {
        return 1000;
    }
}