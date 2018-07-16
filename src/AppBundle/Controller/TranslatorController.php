<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TranslatorController
 * @package AppBundle\Controller
 */
class TranslatorController extends Controller
{

    /**
     * @Route("/translate", name="translate")
     *
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $string = $request->query->get('string');

        if ($string === null) {
            throw new \InvalidArgumentException();
        }

        $translatorService = $this->get('learning.translator.service');
        $result = $translatorService->translate($string, 'ru', 'en');

        return new Response(json_decode($result));
    }

}
