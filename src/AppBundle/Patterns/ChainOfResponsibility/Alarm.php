<?php

namespace AppBundle\Patterns\ChainOfResponsibility;

/**
 * Class Alarm
 * @package AppBundle\Patterns\ChainOfResponsibility
 */
class Alarm extends HomeChecker
{
    /**
     * @param HomeStatus $home
     * @throws \Exception
     */
    public function check(HomeStatus $home) : void
    {
        if (!$home->alarmOn) {
            throw new \Exception('The alarm has not been set');
        }

        $this->next($home);
    }
}