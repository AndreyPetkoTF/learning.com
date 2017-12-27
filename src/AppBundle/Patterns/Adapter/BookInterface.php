<?php

namespace AppBundle\Patterns\Adapter;


/**
 * Class Book
 * @package AppBundle\Patterns\Adapter
 */
interface BookInterface
{
    public function open();

    public function turnPage();
}