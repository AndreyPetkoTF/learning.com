<?php

namespace AppBundle\Patterns\ChainOfResponsibility;

/**
 * Class HomeChecker
 * @package AppBundle\Patterns\ChainOfResponsibility
 */
abstract class HomeChecker
{
    /**
     * @var
     */
    protected $successor;

    /**
     * @param HomeChecker $successor
     */
    public function setSuccessor(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    /**
     * @param HomeStatus $home
     */
    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }

    /**
     * @param HomeStatus $home
     * @return mixed
     */
    public abstract function check(HomeStatus $home);
}