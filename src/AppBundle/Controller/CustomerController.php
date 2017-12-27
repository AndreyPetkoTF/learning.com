<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CustomerController
 * @package AppBundle\Controller
 */
class CustomerController extends Controller
{
    /**
     * @Route("/create-customer/{name}/{isGold}", name="create_customer")
     *
     * @param string $name
     * @param bool $isGold
     */
    public function createCustomerAction(string $name, bool $isGold)
    {

    }
}