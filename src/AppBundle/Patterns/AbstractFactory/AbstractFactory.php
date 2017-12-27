<?php

namespace AppBundle\Patterns\AbstractFactory;

abstract class AbstractFactory
{
    abstract public function createText(string $content): Text;
}