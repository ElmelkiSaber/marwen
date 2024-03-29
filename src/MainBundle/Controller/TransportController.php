<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Transport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Transport controller.
 *
 * @Route("transport")
 */
class TransportController extends Controller
{
    /**
     * Lists all transport entities.
     *
     * @Route("/", name="transport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transports = $em->getRepository('MainBundle:Transport')->findAll();

        return $this->render('transport/index.html.twig', array(
            'transports' => $transports,
        ));
    }

    /**
     * Creates a new transport entity.
     *
     * @Route("/new", name="transport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $transport = new Transport();
        $form = $this->createForm('MainBundle\Form\TransportType', $transport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transport);
            $em->flush();

            return $this->redirectToRoute('transport_show', array('id' => $transport->getId()));
        }

        return $this->render('transport/new.html.twig', array(
            'transport' => $transport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a transport entity.
     *
     * @Route("/{id}", name="transport_show")
     * @Method("GET")
     */
    public function showAction(Transport $transport)
    {
        $deleteForm = $this->createDeleteForm($transport);

        return $this->render('transport/show.html.twig', array(
            'transport' => $transport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transport entity.
     *
     * @Route("/{id}/edit", name="transport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Transport $transport)
    {
        $deleteForm = $this->createDeleteForm($transport);
        $editForm = $this->createForm('MainBundle\Form\TransportType', $transport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transport_edit', array('id' => $transport->getId()));
        }

        return $this->render('transport/edit.html.twig', array(
            'transport' => $transport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a transport entity.
     *
     * @Route("/{id}", name="transport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Transport $transport)
    {
        $form = $this->createDeleteForm($transport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transport);
            $em->flush();
        }

        return $this->redirectToRoute('transport_index');
    }

    /**
     * Creates a form to delete a transport entity.
     *
     * @param Transport $transport The transport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transport $transport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transport_delete', array('id' => $transport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
