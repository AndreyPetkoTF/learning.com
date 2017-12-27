<?php

namespace AppBundle\Closures;

/**
 * Class ProcessSale
 * @package AppBundle\Closures
 */
class ProcessSale
{
    /**
     * @var
     */
    private $callbacks;

    /**
     * @param $callback
     * @throws \Exception
     */
    public function registerCallback($callback) : void
    {
        if(!is_callable($callback)) {
            throw new \Exception("Функция обратного вызова - невызываемая");
        }

        $this->callbacks[] = $callback;
    }

    /**
     * @param $product
     */
    public function sale($product) : void
    {
        echo $product->name . ": обрабатывается \n";

        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}