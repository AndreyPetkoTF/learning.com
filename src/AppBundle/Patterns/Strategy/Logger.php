<?php

namespace AppBundle\Patterns\Strategy;

/**
 * Interface Logger
 * @package AppBundle\Patterns\Strategy
 */
interface Logger
{
    /**
     * @param $data
     * @return mixed
     */
    public function log($data);
}