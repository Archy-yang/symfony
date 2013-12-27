<?php

namespace Hezu\Bundle\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Hz;

class DemoController extends Controller
{
    /**
     * @Hz\Route("/{name}", requirements={"name": "\d+"})
     * @Hz\Template()
     */
    public function indexAction($name)
    {
        return [
            'name' => $name,
        ];
    }
}
