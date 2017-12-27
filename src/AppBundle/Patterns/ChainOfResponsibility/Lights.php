<?php

namespace AppBundle\Patterns\ChainOfResponsibility;

/**
 * Class Lights
 * @package AppBundle\Patterns\ChainOfResponsibility
 */
class Lights extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @throws \Exception
     */
    public function check(HomeStatus $home) : void
    {
        if(!$home->lightOff) {
            throw new \Exception('The lights are still on');
        }

        $this->next($home);
    }
}