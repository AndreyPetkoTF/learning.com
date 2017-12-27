<?php

namespace AppBundle\DelegationWithCall;

/**
 * Class PersonWriter
 * @package AppBundle\DelegationWithCall
 */
class PersonWriter
{
    /**
     * @param Person $person
     */
    public function writeName(Person $person)
    {
        echo $person->getName() . "\n";
    }

    /**
     * @param Person $person
     */
    public function writeAge(Person $person)
    {
        echo $person->getAge() . "\n";
    }
}