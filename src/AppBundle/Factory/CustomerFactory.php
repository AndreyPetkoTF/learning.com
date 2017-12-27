<?php

namespace AppBundle\Factory;

use AppBundle\Entity\Customer;

/**
 * Class CustomerFactory
 * @package AppBundle\Factory
 */
class CustomerFactory
{
    /**
     * @param string $name
     * @param bool $isGold
     * @return Customer
     */
    public function create(string $name, bool $isGold)
    {
        $customer = new Customer();

        $customer->setName($name);
        $customer->setIsGold($isGold);

        return $customer;
    }
}