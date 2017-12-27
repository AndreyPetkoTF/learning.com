<?php

namespace AppBundle\Generator;

/**
 * Class RangeGenerator
 * @package AppBundle\Generator
 */
class RangeGenerator
{
    public function xrange($start, $limit, $step = 1)
    {
        if($start < $limit) {
            if($step <= 0) {
                throw new \Exception('Step must be +ve');
            }

            for($i = $start; $i <= $limit; $i += $step) {
                yield $i;
            }
        } else {
            if($step >= 0) {
                throw new \Exception('Step must be -ve');
            }

            for ($i = $start; $i >= $limit; $i += $step) {
                yield $i;
            }
        }
    }
}