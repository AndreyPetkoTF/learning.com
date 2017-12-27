<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class FrontendController
 * @package AppBundle\Controller
 *
 * @Route("frontend")
 */
class FrontendController extends Controller
{
    /**
     * @Route("/", name="front_end_index")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Frontend:index.html.twig');
    }

    /**
     * @Route("/delegation", name="delegation")
     */
    public function delegationAction()
    {
        return $this->render('@App/Frontend/delegation.html.twig');
    }

    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction()
    {
        return $this->render('@App/Frontend/ajax.html.twig');
    }

    /**
     * @Route("/ajax-array", name="ajax_array")
     */
    public function ajaxArrayAction()
    {
        $array = [
            'hello' => 'world',
            'text' => 'text2'
        ];

        return new JsonResponse($array);
    }


    /**
     * @Route("/dom", name="dom")
     */
    public function domAction()
    {
        return $this->render('@App/Frontend/dom.html.twig');
    }
    
    /**
     * @Route("/promise", name="promise")
     */
    public function promiseAction()
    {
        return $this->render('@App/Frontend/promise.html.twig');
    }

    /**
     * @Route("/loop", name="loop")
     */
    public function loopAction()
    {
        return $this->render('@App/Frontend/loop.html.twig');
    }
}