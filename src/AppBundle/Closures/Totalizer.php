<?php

namespace AppBundle\Closures;


/**
 * Class Totalizer
 * @package AppBundle\Closures
 */
class Totalizer
{
    /**
     * @param $amt
     * @return \Closure
     */
    public static function warnAmount($amt)
    {
        $count = 0;

        return function ($product) use ($amt, &$count) {
            $count += $product->price;
            echo "сумма:" . $count . "\n";

            if($count > $amt) {
                echo "Продано товаров на сумму:" . $count . "\n";
            }
        };
    }
}