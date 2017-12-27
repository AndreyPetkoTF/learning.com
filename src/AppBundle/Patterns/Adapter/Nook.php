<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Class Nook
 * @package AppBundle\Patterns\Adapter
 */
class Nook implements eReaderInterface
{
    /**
     *
     */
    public function turnOn()
    {
        echo 'turn nook on';
    }

    /**
     *
     */
    public function pressNextButton()
    {
        echo 'press the next button on the Nook';
    }
}