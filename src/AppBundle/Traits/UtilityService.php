<?php

namespace AppBundle\Traits;

/**
 * Class UtilityService
 * @package AppBundle\Traits
 */
class UtilityService
{
    use PriceUtilities, TaxTools {
        /**
         * use method "calculateTax" from PriceUtilities
         */
        PriceUtilities::calculateTax insteadof TaxTools;

        /**
         * use method "calculateTax" from TaxTools
         * as method "calculate"
         */
        TaxTools::calculateTax as calculate;

        /**
         * set "calculateTax" to private
         */
        PriceUtilities::calculateTax as private;
    }

    /**
     * @return int
     */
    public function getTaxRate() : int
    {
        return 10;
    }

    /**
     * @param $price
     * @return float
     */
    public function getFinalPrice($price) : float
    {
        return $price + $this->calculateTax($price);
    }
}