<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Creative;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Creative controller.
 *
 * @Route("creative")
 */
class CreativeController extends Controller
{
    /**
     * Lists all creative entities.
     *
     * @Route("/", name="creative_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $creatives = $em->getRepository('AppBundle:Creative')->findAll();

        return $this->render('creative/index.html.twig', array(
            'creatives' => $creatives,
        ));
    }

    /**
     * Creates a new creative entity.
     *
     * @Route("/new", name="creative_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $creative = new Creative();
        $form = $this->createForm('AppBundle\Form\CreativeType', $creative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creative);
            $em->flush();

            return $this->redirectToRoute('creative_show', array('id' => $creative->getId()));
        }

        return $this->render('creative/new.html.twig', array(
            'creative' => $creative,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a creative entity.
     *
     * @Route("/{id}", name="creative_show")
     * @Method("GET")
     */
    public function showAction(Creative $creative)
    {
        $deleteForm = $this->createDeleteForm($creative);

        return $this->render('creative/show.html.twig', array(
            'creative' => $creative,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing creative entity.
     *
     * @Route("/{id}/edit", name="creative_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Creative $creative)
    {
        $deleteForm = $this->createDeleteForm($creative);
        $editForm = $this->createForm('AppBundle\Form\CreativeType', $creative);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('creative_edit', array('id' => $creative->getId()));
        }

        return $this->render('creative/edit.html.twig', array(
            'creative' => $creative,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a creative entity.
     *
     * @Route("/{id}", name="creative_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Creative $creative)
    {
        $form = $this->createDeleteForm($creative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creative);
            $em->flush();
        }

        return $this->redirectToRoute('creative_index');
    }

    /**
     * Creates a form to delete a creative entity.
     *
     * @param Creative $creative The creative entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Creative $creative)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creative_delete', array('id' => $creative->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
