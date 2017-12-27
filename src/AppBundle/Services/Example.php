<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/10/17
 * Time: 16:43
 */

namespace AppBundle\Services;


use AppBundle\Patterns\Template\VeggieSub;

/**
 * Class Example
 * @package AppBundle\Services
 */
class Example extends OtherExample
{
    /**
     * Example constructor.
     * @param VeggieSub $veggieSub
     */
    public function __construct(VeggieSub $veggieSub)
    {
        parent::__construct($veggieSub, 1);
    }


    /**
     * @param VeggieSub $veggieSub
     */
    public function setItem(VeggieSub $veggieSub)
    {

    }
}