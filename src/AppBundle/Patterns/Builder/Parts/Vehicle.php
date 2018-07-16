<?php

namespace AppBundle\Patterns\Builder\Parts;

abstract class Vehicle
{
    private $data = [];

    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}