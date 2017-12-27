<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class FlexboxController
 * @package AppBundle\Controller
 *
 * @Route("/flex")
 */
class FlexboxController extends Controller
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Flexbox:index.html.twig');
    }

    /**
     * @Route("/episod-2", name="episod2")
     */
    public function episod2Action()
    {
        return $this->render('AppBundle:Flexbox:episod2.html.twig');
    }

    /**
     * @Route("/episod-3", name="episod3")
     */
    public function episod3Action()
    {
        return $this->render('AppBundle:Flexbox:episod3.html.twig');
    }

    /**
     * @Route("/episod-4", name="episod4")
     */
    public function episod4Action()
    {
        return $this->render('AppBundle:Flexbox:episod4.html.twig');
    }

    /**
     * @Route("/episod-5", name="episod5")
     */
    public function episod5Action()
    {
        return $this->render('AppBundle:Flexbox:episod5.html.twig');
    }
    
    /**
     * @Route("/alternate", name="alternate")
     */
    public function alternateAction()
    {
        return $this->render('AppBundle:Flexbox:alternate.html.twig');
    }

    /**
     * @Route("/episod-6", name="episod6")
     */
    public function episod6Action()
    {
        return $this->render('AppBundle:Flexbox:episod6.html.twig');
    }


    /**
     * @Route("/episod-7", name="episod7")
     */
    public function episod7Action()
    {
        return $this->render('AppBundle:Flexbox:episod7.html.twig');
    }
}
