<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Form\PaqueteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Paquete;

/**
 * Controller used to manage paquete contents in the backend.
 *
 * Please note that the application backend is developed manually for learning
 * purposes. However, in your real Symfony application you should use any of the
 * existing bundles that let you generate ready-to-use backends without effort.
 * See http://knpbundles.com/keyword/admin
 *
 * @Route("/admin/paquete")
 * @Security("has_role('ROLE_ADMIN')")
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PaqueteController extends Controller
{
    /**
     * Lists all Paquete entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_paquete_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/", name="admin_index")
     * @Route("/", name="admin_paquete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $paquetes = $entityManager->getRepository('AppBundle:Paquete')->findAll();

        return $this->render('admin/paquete/index.html.twig', array('paquetes' => $paquetes));
    }

    /**
     * Creates a new Paquete entity.
     *
     * @Route("/new", name="admin_paquete_new")
     * @Method({"GET", "POST"})
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function newAction(Request $request)
    {
        $paquete = new Paquete();

        // See http://symfony.com/doc/current/book/forms.html#submitting-forms-with-multiple-buttons
        $form = $this->createForm(new PaqueteType(), $paquete)
            ->add('saveAndCreateNew', 'submit');

        $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See http://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            $paquete->setSlug($this->get('slugger')->slugify($paquete->getTitulo()));
            $paquete->setActivado(0);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paquete);
            $entityManager->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See http://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'paquete.created_successfully');

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('admin_paquete_new');
            }

            return $this->redirectToRoute('admin_paquete_index');
        }

        return $this->render('admin/paquete/new.html.twig', array(
            'paquete' => $paquete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paquete entity.
     *
     * @Route("/{id}", requirements={"id" = "\d+"}, name="admin_paquete_show")
     * @Method("GET")
     */
    public function showAction(Paquete $paquete)
    {
        $deleteForm = $this->createDeleteForm($paquete);

        return $this->render('admin/paquete/show.html.twig', array(
            'paquete'        => $paquete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Paquete entity.
     *
     * @Route("/{id}/edit", requirements={"id" = "\d+"}, name="admin_paquete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Paquete $paquete, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(new PaqueteType(), $paquete);
        $deleteForm = $this->createDeleteForm($paquete);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $paquete->setSlug($this->get('slugger')->slugify($paquete->getTitulo()));
            $entityManager->flush();

            $this->addFlash('success', 'paquete.updated_successfully');

            return $this->redirectToRoute('admin_paquete_edit', array('id' => $paquete->getId()));
        }

        return $this->render('admin/paquete/edit.html.twig', array(
            'paquete'        => $paquete,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Paquete entity.
     *
     * @Route("/{id}", name="admin_paquete_delete")
     * @Method("DELETE")
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the AppBundle\Entity\Paquete entity.
     */
    public function deleteAction(Request $request, Paquete $paquete)
    {
        $form = $this->createDeleteForm($paquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->remove($paquete);
            $entityManager->flush();

            $this->addFlash('success', 'paquete.deleted_successfully');
        }

        return $this->redirectToRoute('admin_paquete_index');
    }

    /**
     * Deletes a Paquete entity.
     *
     * @Route("/{id}/delete", name="admin_paquete_list_delete")
     * @Method({"GET", "POST"})
     *
     * The Security annotation value is an expression (if it evaluates to false,
     * the authorization mechanism will prevent the user accessing this resource).
     * The isAuthor() method is defined in the AppBundle\Entity\Paquete entity.
     */
    public function listDeleteAction(Request $request, Paquete $paquete)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($paquete);
        $entityManager->flush();

        $this->addFlash('success', 'paquete.deleted_successfully');

        return $this->redirectToRoute('admin_paquete_index');
    }

    /**
     * Enables an existing Paquete entity.
     *
     * @Route("/{id}/enable", requirements={"id" = "\d+"}, name="admin_paquete_enable")
     * @Method({"GET", "POST"})
     */
    public function enableAction(Paquete $paquete, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $paquete->setActivado(1);
        $entityManager->flush();

        $this->addFlash('success', 'paquete.enabled_successfully');

        return $this->redirectToRoute('admin_paquete_index');
    }

    /**
     * Disables an existing Paquete entity.
     *
     * @Route("/{id}/disable", requirements={"id" = "\d+"}, name="admin_paquete_disable")
     * @Method({"GET", "POST"})
     */
    public function disableAction(Paquete $paquete, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $paquete->setActivado(0);
        $entityManager->flush();

        $this->addFlash('success', 'paquete.disabled_successfully');

        return $this->redirectToRoute('admin_paquete_index');
    }

    /**
     * Creates a form to delete a Paquete entity by id.
     *
     * This is necessary because browsers don't support HTTP methods different
     * from GET and POST. Since the controller that removes the paquete paquetes expects
     * a DELETE method, the trick is to create a simple form that *fakes* the
     * HTTP DELETE method.
     * See http://symfony.com/doc/current/cookbook/routing/method_parameters.html.
     *
     * @param Paquete $paquete The paquete object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paquete $paquete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_paquete_delete', array('id' => $paquete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
