<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advertiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Advertiser controller.
 *
 * @Route("advertiser")
 */
class AdvertiserController extends Controller
{
    /**
     * Lists all advertiser entities.
     *
     * @Route("/", name="advertiser_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $advertisers = $em->getRepository('AppBundle:Advertiser')->findAll();

        return $this->render('advertiser/index.html.twig', array(
            'advertisers' => $advertisers,
        ));
    }

    /**
     * Creates a new advertiser entity.
     *
     * @Route("/new", name="advertiser_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $advertiser = new Advertiser();
        $form = $this->createForm('AppBundle\Form\AdvertiserType', $advertiser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertiser);
            $em->flush();

            return $this->redirectToRoute('advertiser_show', array('slug' => $advertiser->getSlug()));
        }

        return $this->render('advertiser/new.html.twig', array(
            'advertiser' => $advertiser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a advertiser entity.
     *
     * @Route("/{slug}", name="advertiser_show")
     * @Method("GET")
     */
    public function showAction(Advertiser $advertiser)
    {
        $deleteForm = $this->createDeleteForm($advertiser);

        return $this->render('advertiser/show.html.twig', array(
            'advertiser' => $advertiser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing advertiser entity.
     *
     * @Route("/{id}/edit", name="advertiser_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Advertiser $advertiser)
    {
        $deleteForm = $this->createDeleteForm($advertiser);
        $editForm = $this->createForm('AppBundle\Form\AdvertiserType', $advertiser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advertiser_edit', array('id' => $advertiser->getId()));
        }

        return $this->render('advertiser/edit.html.twig', array(
            'advertiser' => $advertiser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a advertiser entity.
     *
     * @Route("/{id}", name="advertiser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Advertiser $advertiser)
    {
        $form = $this->createDeleteForm($advertiser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advertiser);
            $em->flush();
        }

        return $this->redirectToRoute('advertiser_index');
    }

    /**
     * Creates a form to delete a advertiser entity.
     *
     * @param Advertiser $advertiser The advertiser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Advertiser $advertiser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advertiser_delete', array('id' => $advertiser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @Route("/{slug}/creatives", name="advertiser_show_creatives")
     * @Method("GET")
     */
    public function getCreativesAction(Advertiser $advertiser)
    {
        foreach ($advertiser->getCreatives() as $creative){
            dump($creative);
        }

        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];
        $data = [
            'notes' => $notes
        ];
        return new JsonResponse($data);

    }
}
