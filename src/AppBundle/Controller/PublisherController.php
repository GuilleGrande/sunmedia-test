<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{
    /**
     * @Route("/publisher/{publisherName}")
     */
    public function showAction($publisherName) {

        $notes = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
        ];

        return $this->render('publisher/show.html.twig', [
            'name' => $publisherName,
            'notes' => $notes
        ]);
    }


    /**
     * @Route("/all-publishers", name="show_all_publishers")
     * @Method("GET")
     */
    public function getAllPublishersAction(){

        $data = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
        ];

        return new JsonResponse($data);

    }
}