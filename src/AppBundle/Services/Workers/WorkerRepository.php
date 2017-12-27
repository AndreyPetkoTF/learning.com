<?php

namespace AppBundle\Services\Workers;



/**
 * Class WorkerRepository
 * @package AppBundle\Services\Workers
 */
class WorkerRepository
{

    /**
     * @var array
     */
    private $workers = [];

    /**
     * @param AbstractWorker $worker
     */
    public function addWorker(AbstractWorker $worker)
    {
        $this->workers[] = $worker;                   
    }

    /**
     * @param bool $desc
     * @return $this
     */
    public function getSortBySalary(bool $desc = true)
    {
        $workers = $this->workers;

        usort($workers, function($worker, $otherWorker) use ($desc) {
            /**
             * @var AbstractWorker $worker
             * @var AbstractWorker $otherWorker
             */

            if($desc) {
                return $worker->getMonthSalary() > $otherWorker->getMonthSalary();
            } else {
                return $worker->getMonthSalary() <= $otherWorker->getMonthSalary();
            }
        });

        $this->workers = $workers;

        return $this;
    }


    /**
     * @param int $limit
     * @return array
     */
    public function getFirstNames(int $limit = 5)
    {
        $names = [];
        $count = 0;

        while($count !== $limit || !isset($this->workers[$count])) {
            dump($count);
//            $names[] = $this->workers[$count]->getName();
            $count++;
        }

        return $names;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->workers;
    }
}