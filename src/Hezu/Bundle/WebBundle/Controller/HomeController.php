<?php

namespace Hezu\Bundle\WebBundle\Controller;

use Hezu\Bundle\WebBundle\Entity\Home;
use Hezu\Bundle\WebBundle\Form\HomeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Hz;

class HomeController extends Controller
{
    /**
     * @Hz\Route("/new")
     */
    public function newAction()
    {
        $home = new Home();

        $entity = $this->getDoctrine()->getRepository('HezuWebBundle:Home');

        $entity->persist($home);
        $entity->flush();
    }

    /**
     * @Hz\Route("/add")
     * @Hz\Template()
     * @Hz\Method("get")
     */
    public function addAction()
    {
        $form = $this->createForm(new HomeType());

        return [
            'form' => $form->createView(),
        ];
    }

    /**
        * @Hz\Route("/add", name="hezu_web_home_update")
        * @Hz\Method("post")
     */
    public function updateAction(Request $request)
    {
        $id = '1';

        $em = $this->getDoctrine()->getManager();

        $home = $em->getRepository('HezuWebBundle:Home')->find($id);

        if (null === $home) {
            throw $this->createNotFoundException();
        }

        $form = $this->createForm(new HomeType());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->get('users')->getData();

            $users = json_decode($home->getUsers(), true);
            $users[] = $user;
            $users = json_encode($users);

            if (null === $users) {
                throw $this->createNotFoundException();
            }

            $home->setUsers($users);

            $em->persist($home);

            $em->flush();

        }
    }
}
