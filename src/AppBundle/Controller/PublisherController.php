<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publisher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{

    /**
     * @Route("/publisher/new")
     */
    public function newAction() {

        $publisher = new Publisher();
        $publisher->setName('Sunmedia'.rand(1,100));

        $em = $this->getDoctrine()->getManager();

        $creative = $em->getRepository('AppBundle:Creative')
            ->findOneBy(['id' => 4]);

        $publisher->addRelatedCreatives($creative);

        $em->persist($publisher);
        $em->flush();

        return new Response('<html><body><h1>Publisher Created!</h1></body></html>');
    }

    /**
     * Lists all publishers entities
     * 
     * @Route("/publisher/", name="publisher_index")
     */
    public function indexAction(){

        $em = $this->getDoctrine()->getManager();
        $publishers = $em->getRepository('AppBundle:Publisher')
            ->findAll();

        return $this->render('publisher/index.html.twig', [
            'publishers' => $publishers,
        ]);

    }

    /**
     * @Route("/publisher/{publisherName}", name="publisher_show")
     */
    public function showAction($publisherName) {

        $em = $this->getDoctrine()->getManager();
        $publisher = $em->getRepository('AppBundle:Publisher')
            ->findOneBy(['name' => $publisherName]);

        if (!$publisher) {
            throw $this->createNotFoundException('No publisher found');
        }

        return $this->render('publisher/show.html.twig', [
            'publisher' => $publisher
        ]);
    }

}