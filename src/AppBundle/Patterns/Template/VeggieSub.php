<?php

namespace AppBundle\Patterns\Template;


/**
 * Class VeggieSub
 * @package AppBundle\Patterns\Template
 */
class VeggieSub extends Sub
{

    /**
     * @return $this
     */
    public function addPrimaryToppings()
    {
        var_dump('add some veggie');

        return $this;
    }

}