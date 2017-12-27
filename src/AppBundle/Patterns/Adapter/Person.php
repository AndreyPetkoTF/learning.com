<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Class Person
 * @package AppBundle\Patterns\Adapter
 */
class Person
{
    /**
     * @param BookInterface $book
     */
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}