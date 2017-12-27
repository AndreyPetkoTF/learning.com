<?php

namespace AppBundle\Services\Workers;

use Doctrine\Common\Annotations\Annotation\Attributes;

/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/23/17
 * Time: 16:10
 */
class PerHourWorker extends AbstractWorker
{
    /**
     * @var
     */
    private $hourPrice;
    /**
     * @var
     */
    private $id;
    /**
     * @var string
     */
    private $name;

    /**
     * PerHourWorker constructor.
     * @param float $hourPrice
     * @param int $id
     * @param string $name
     */
    public function __construct(float $hourPrice, int $id, string $name)
    {
        $this->hourPrice = $hourPrice;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     *
     */
    function getMonthSalary() : float
    {
        return 20.8 * 8 * $this->hourPrice;
    }

    /**
     * @return mixed
     * @Attributes(1)
     */
    public function getHourPrice()
    {
        return $this->hourPrice;
    }

    /**
     * @param mixed $hourPrice
     */
    public function setHourPrice($hourPrice)
    {
        $this->hourPrice = $hourPrice;
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