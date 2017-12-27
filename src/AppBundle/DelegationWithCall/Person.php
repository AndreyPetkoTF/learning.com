<?php

namespace AppBundle\DelegationWithCall;

/**
 * Class Person
 * @package AppBundle\DelegationWithCall
 */
class Person
{
    /**
     * @var PersonWriter
     */
    private $personWriter;

    /**
     * Person constructor.
     * @param PersonWriter $personWriter
     */
    public function __construct(PersonWriter $personWriter)
    {

        $this->personWriter = $personWriter;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->personWriter, $name)) {
            return $this->personWriter->$name($this);
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Иван';
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return 44;
    }

}