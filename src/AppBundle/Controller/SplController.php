<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class SplController
 * @package AppBundle\Controller
 */
class SplController extends Controller
{
    /**
     * @Route("/directory-iterator-example", name="directory_iterator_example")
     */
    public function directoryIteratorExampleAction()
    {
        $splExamples = $this->get('learning.spl.spl_examples');
        $splExamples->directoryIteratorExample('./');
    }

    /**
     * @Route("/array-object-example", name="array_object_example")
     */
    public function arrayObjectExampleAction()
    {
        $splExamples = $this->get('learning.spl.spl_examples');
        $splExamples->arrayObjectExample([1, 2, 3, 4, 5]);
    }
}