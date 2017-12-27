<?php

namespace AppBundle\Services\Workers;

/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/23/17
 * Time: 16:11
 */
class PerMonthWorker extends AbstractWorker
{
    /**
     * @var
     */
    private $monthSalary;
    /**
     * @var
     */
    private $id;
    /**
     * @var string
     */
    private $name;


    /**
     * PerMonthWorker constructor.
     * @param float $monthSalary
     * @param int $id
     * @param string $name
     */
    public function __construct(float $monthSalary, int $id, string $name)
    {
        $this->monthSalary = $monthSalary;
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * @return float
     */
    function getMonthSalary() : float
    {
        return $this->monthSalary;
    }


    /**
     * @return int
     */
    function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    function getName(): string
    {
        return $this->name;
    }
}