<?php

namespace AppBundle\Controller;

use AppBundle\Patterns\AbstractFactory\HtmlFactory;
use AppBundle\Patterns\AbstractFactory\JsonFactory;
use AppBundle\Patterns\Decorator\BasicInspection;
use AppBundle\Patterns\Decorator\OilChange;
use AppBundle\Patterns\Decorator\TireRotation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PatternController
 * @package AppBundle\Controller
 *
 * @Route("/pattern")
 */
class PatternController extends Controller
{
    /**
     * @Route("/decorator", name="decorator")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function decoratorAction()
    {
        $service = new OilChange(new TireRotation(new BasicInspection()));

        return $this->render('AppBundle:Pattern:decorator.html.twig', compact('service'));
    }

    /**
     * @Route("/adapter", name="adapter")
     */
    public function adapterAction()
    {
        $book = $this->get('learning.adapter.book');
        $person = $this->get('learning.adapter.person');
        $kindleAdapter = $this->get('learning.adapter.kindle_adapter');

        $person->read($book);

        /**
         * Same as $person->read(new eReaderAdapter(new Kindle()));
         */
        $person->read($kindleAdapter);

        die;
    }
    
    /**
     * @Route("/template", name="template")
     */
    public function templateAction()
    {
        $turkeySub = $this->get('learning.template.turkey_sub');

        $turkeySub->make();
        die;
    }

    /**
     * @Route("/strategy/{slug}", name="strategy")
     *
     * @param $slug string
     */
    public function strategyAction(string $slug)
    {
        $loggerService = $this->get('learning.strategy.logger_service');

        $loggerService->log('new log info', $slug);
        die;
    }

    /**
     * @Route("/chain-of-responsibility", name="chain_of_responsibility")
     */
    public function chainOfResponsibilityAction()
    {
        $homeStatus = $this->get('learning.chain.home_status');

        $light = $this->get('learning.chain.lights');
        $locks = $this->get('learning.chain.locks');
        $alarm = $this->get('learning.chain.alarm');

        $light->setSuccessor($locks);
        $locks->setSuccessor($alarm);

        $light->check($homeStatus);

        die;
    }
    
    /**
     * @Route("/abstract-factory", name="abstract_factory")
     */
    public function abstractFactoryAction()
    {
        $factory = new HtmlFactory();
        $entity = $factory->createText('foobar');

        dump(get_class($entity));

        $anotherFactory = new JsonFactory();
        $entity = $anotherFactory->createText('boofar');

        dump($entity);
        die;
    }
}