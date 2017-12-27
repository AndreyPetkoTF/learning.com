<?php

namespace AppBundle\Listener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\Router;

/**
 * Class RequestListener
 * @package AppBundle\Listener
 */
class RequestListener
{
    /**
     *
     */
    const REDITECT_TO_HOME = false;
    /**
     * @var Router
     */
    private $router;

    /**
     * RequestListener constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if(!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();
        $routeName  = $request->attributes->get('_route');

        if($routeName !== 'homepage' && self::REDITECT_TO_HOME) {
            $url = $this->router->generate('homepage');
            $response = new RedirectResponse($url);
            $event->setResponse($response);
        }
    }
}