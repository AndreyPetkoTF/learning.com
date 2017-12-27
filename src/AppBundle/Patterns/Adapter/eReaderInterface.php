<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Interface eReaderInterface
 * @package AppBundle\Patterns\Adapter
 */
interface eReaderInterface
{
    /**
     * @return mixed
     */
    public function turnOn();

    /**
     * @return mixed
     */
    public function pressNextButton();
}