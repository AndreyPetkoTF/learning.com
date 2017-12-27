<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Class Book
 * @package AppBundle\Patterns\Adapter
 */
class Book implements BookInterface
{

    public function open()
    {
        echo 'open book';
    }

    public function turnPage()
    {
        echo 'turn page';
    }
}