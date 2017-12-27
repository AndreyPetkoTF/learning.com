<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Class Kindle
 * @package AppBundle\Patterns\Adapter
 */
class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        echo 'turn kindle on';
    }

    public function pressNextButton()
    {
        echo 'press the next button on the Kindle';
    }
}