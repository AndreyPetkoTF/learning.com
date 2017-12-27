<?php


namespace AppBundle\Services\Workers;

/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/23/17
 * Time: 16:10
 */
abstract class AbstractWorker
{
    /**
     * @return float
     */
    abstract function getMonthSalary() : float;

    /**
     * @return int
     */
    abstract function getId() : int;

    /**
     * @return string
     */
    abstract function getName() : string;
}