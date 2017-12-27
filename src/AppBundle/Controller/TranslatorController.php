<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TranslatorController
 * @package AppBundle\Controller
 */
class TranslatorController extends Controller
{

    /**
     * @Route("/translate", name="translate")
     */
    public function indexAction()
    {
        $string = 'Всем привет';

        $translatorService = $this->get('learning.translator.service');
        $result = $translatorService->translate($string);
        dump($result);
        die;
//        return $this->render('', array('name' => $name));
    }
}
