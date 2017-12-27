<?php

namespace AppBundle\Controller;

use AppBundle\Patterns\Adapter\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ReflectionController
 * @package AppBundle\Controller
 * @Route("/reflection")
 */
class ReflectionController extends Controller
{
    /**
     * @Route("/class-info", name="class_info")
     */
    public function classInfoAction()
    {
        $personClass = new \ReflectionCLass(Person::class);
        dump($personClass);
        die;
    }
}