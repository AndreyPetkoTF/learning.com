<?php

namespace AppBundle\Services;
use AppBundle\Exception\NoHandlerException;

/**
 * Class ArrayWorkHelper
 * @package AppBundle\Helper
 */
class ArrayWorkHelper
{
    /**
     * @var
     */
    protected $currentHandlers;

    /**
     * @var
     */
    protected $hanlders;

    /**
     * ArrayWorkHelper constructor.
     */
    public function __construct()
    {
        $this->hanlders = [
            'round' => function ($item) {
                return round($item, 2);
            },
            'abs' => function ($item) {
                return abs($item);
            }
        ];
    }

    /**
     * @param array $array
     * @return array
     */
    public function roundAllNumeric(array $array): array
    {
        $this->addHandler('round');
        $array = $this->run($array);

        return $array;
    }


    /**
     * @param array $array
     * @return array
     */
    public function handle(array $array): array
    {
        $array = $this->run($array);
        $this->currentHandlers = [];

        return $array;
    }

    /**
     * @param array $array
     * @return array
     */
    private function run(array &$array): array
    {
        foreach ($array as &$item) {
            if (is_array($item)) {
                $this->run($item);
            }

            if (is_numeric($item)) {
                foreach ($this->currentHandlers as $currentHandler) {
                    /**
                     * @var $currentHandler \Closure
                     */
                    $item = $currentHandler->call($this, $item);
                }
            }
        }

        return $array;
    }

    /**
     * @param string $slug
     * @throws NoHandlerException
     */
    public function addHandler(string $slug): void
    {
        if(!isset($this->hanlders[$slug])) {
            throw new NoHandlerException($slug);
        }

        $this->currentHandlers[] = $this->hanlders[$slug];
    }

    /**
     * @param \Closure $closure
     */
    public function addCustomHandler(\Closure $closure): void
    {
        $this->currentHandlers[] = $closure;
    }
}