<?php

namespace AppBundle\Patterns\Template;


/**
 * Class TurkeySub
 * @package AppBundle\Patterns\Template
 */
class TurkeySub extends Sub
{

    /**
     * @return $this
     */
    public function addPrimaryToppings()
    {
        var_dump('add some turkey');

        return $this;
    }

}