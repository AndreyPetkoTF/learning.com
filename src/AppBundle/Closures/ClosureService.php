<?php

namespace AppBundle\Closures;

/**
 * Class ClosureService
 * @package AppBundle\Closures
 */
class ClosureService
{
    /**
     * @return \Closure
     */
    public function getClosure()
    {
        $g = 'test';

        $c = function($a, $b) use ($g) {
            echo $a . $b . $g;
        };

        $g = 'test2';

        return $c;
    }


    /**
     * @return \Closure
     */
    public function getFactorial()
    {
        // recursive call of $factorial intil $n not equals 1
        $factorial = function($n) use (&$factorial) {
            if($n === 1) {
                return 1;
            }

            return $factorial($n - 1) * $n;
        };

        return $factorial;
    }

}