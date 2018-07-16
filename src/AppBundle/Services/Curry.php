<?php

namespace AppBundle\Services;

class Curry
{
    public static function curry($f, $argument)
    {
        return function (...$arguments) use ($f, $argument) {
            return $f(...array_merge([$argument], $arguments));
        };
    }
}
//
//function add(...$numbers)
//{
//    return array_sum($numbers);
//}
//
//$incrementWith5 = Curry::curry('add', 5);
//echo $incrementWith5(1, 2, 3);