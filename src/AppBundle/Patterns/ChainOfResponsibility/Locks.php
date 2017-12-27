<?php

namespace AppBundle\Patterns\ChainOfResponsibility;

/**
 * Class Locks
 * @package AppBundle\Patterns\ChainOfResponsibility
 */
class Locks extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @throws \Exception
     */
    public function check(HomeStatus $home) : void
    {
        if (!$home->locked) {
            throw new \Exception('The doors are not locked');
        }

        $this->next($home);
    }
}