<?php

namespace AppBundle\Patterns\Template;


/**
 * Class Sub
 * @package AppBundle\Patterns\Template
 */
abstract class Sub
{
    /**
     * @return mixed
     */
    final public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    /**
     * @return $this
     */
    protected function layBread()
    {
        var_dump('laying down the bread');

        return $this;
    }

    /**
     * @return $this
     */
    protected function addLettuce()
    {
        var_dump('add some lettuce');

        return $this;
    }

    /**
     * @return $this
     */
    protected function addSauces()
    {
        var_dump('add some sauces');

        return $this;
    }

    /**
     * @return mixed
     */
    protected abstract function addPrimaryToppings();
}