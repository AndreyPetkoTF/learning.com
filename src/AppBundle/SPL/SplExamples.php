<?php

namespace AppBundle\SPL;

/**
 * Class SplExamples
 * @package AppBundle\SPL
 */
class SplExamples
{


    /**
     * @param string $path
     */
    public function directoryIteratorExample(string $path)
    {
        $it = new \DirectoryIterator($path);

        while($it->valid()) {
            echo $it->current()->getFilename() . "<br>";
            $it->next();
        }

        die;
    }


    /**
     * @param array $array
     */
    public function arrayObjectExample(array $array)
    {
        $arrayObj = new \ArrayObject($array);

        $it = $arrayObj->getIterator();

        while($it->valid()) {
            echo $it->key() . ' => ' . $it->current() . '<br>';
            $it->next();
        }

        die;
    }
}