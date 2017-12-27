<?php

namespace AppBundle\Patterns\Adapter;

/**
 * Class eReaderAdapter
 * @package AppBundle\Patterns\Adapter
 */
class eReaderAdapter implements BookInterface
{

    /**
     * @var eReaderInterface
     */
    private $reader;

    /**
     * eReaderAdapter constructor.
     * @param eReaderInterface $reader
     */
    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     *
     */
    public function open()
    {
        $this->reader->turnOn();
    }

    /**
     *
     */
    public function turnPage()
    {
        $this->reader->pressNextButton();
    }
}