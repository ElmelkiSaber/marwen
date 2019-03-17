<?php

namespace MainBundle\Controller;

use MainBundle\Entity\OffreVoyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use MainBundle\Entity\Client;
use MainBundle\Entity\Hotel;
use MainBundle\Entity\Transport;
use MainBundle\Entity\Chambre;

/**
 * Offrevoyage controller.
 *
 * @Route("offrevoyage")
 */
class OffreVoyageController extends Controller
{
    /**
     * Lists all offreVoyage entities.
     *
     * @Route("/", name="offrevoyage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreVoyages = $em->getRepository('MainBundle:OffreVoyage')->findBy(array('isActive'=>1));

        return $this->render('offrevoyage/index.html.twig', array(
            'offreVoyages' => $offreVoyages,
        ));
    }

    /**
     * Creates a new offreVoyage entity.
     *
     * @Route("/new", name="offrevoyage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $offreVoyage = new Offrevoyage();

        $client = new Client();
        $transport = new Transport();
        $hotel = new Hotel();

        $offreVoyage->addClient($client);
        $offreVoyage->addTransport($transport);

         $chambre = new Chambre();
         $hotel->addChambre($chambre);
         $offreVoyage->addHotel($hotel);

        $form = $this->createForm('MainBundle\Form\OffreVoyageType', $offreVoyage);
 
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid()) {
            //dump($request->request);die();

            $em = $this->getDoctrine()->getManager();
            $offreVoyage->setIsActive(1);
            $em->persist($offreVoyage);
            $em->flush();


            $client->setOffreVoyage($offreVoyage);
            $transport->setOffreVoyage($offreVoyage);
            $hotel->setOffreVoyage($offreVoyage);
            $hotel->setOffreVoyage($offreVoyage);
            
            $em->flush();
            $chambre->setHotel($hotel);
           $em->flush();



            return $this->redirectToRoute('offrevoyage_index');
        }

        return $this->render('offrevoyage/new.html.twig', array(
            'offreVoyage' => $offreVoyage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offreVoyage entity.
     *
     * @Route("/{id}", name="offrevoyage_show")
     * @Method("GET")
     */
    public function showAction(OffreVoyage $offreVoyage)
    {
        $deleteForm = $this->createDeleteForm($offreVoyage);

        return $this->render('offrevoyage/show.html.twig', array(
            'offreVoyage' => $offreVoyage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offreVoyage entity.
     *
     * @Route("/{id}/edit", name="offrevoyage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OffreVoyage $offreVoyage)
    {
        $deleteForm = $this->createDeleteForm($offreVoyage);
        $editForm = $this->createForm('MainBundle\Form\OffreVoyageType', $offreVoyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offrevoyage_index');
        }

        return $this->render('offrevoyage/edit.html.twig', array(
            'offreVoyage' => $offreVoyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offreVoyage entity.
     *
     * @Route("/delete/{id}", name="offrevoyage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OffreVoyage $offreVoyage)
    {
       // $form = $this->createDeleteForm($offreVoyage);
        //$form->handleRequest($request);

        /*if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offreVoyage);
            $em->flush();
        }*/
        $em = $this->getDoctrine()->getManager();
        $offreVoyage->setIsActive(0);
        $em->flush();
        return $this->redirectToRoute('offrevoyage_index');
    }

    /**
     * Creates a form to delete a offreVoyage entity.
     *
     * @param OffreVoyage $offreVoyage The offreVoyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OffreVoyage $offreVoyage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offrevoyage_delete', array('id' => $offreVoyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
