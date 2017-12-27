<?php

namespace AppBundle\Exception;

/**
 * Class NoHandlerException
 */
class NoHandlerException extends \Exception
{
    /**
     * NoHandlerException constructor.
     * @param string $slug
     */
    public function __construct(string $slug)
    {
        $this->message = 'No handler with slug: ' . $slug;
    }
}