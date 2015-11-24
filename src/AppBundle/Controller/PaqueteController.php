<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Paquete;
use AppBundle\Entity\Currency;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Intl;

/**
 * @Route("/paquetes")
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PaqueteController extends Controller
{
    /**
     * @Route("/", name="paquete_index", defaults={"page" = 1})
     * @Route("/page/{page}", name="paquete_index_paginated", requirements={"page" : "\d+"})
     */
    public function indexAction($page)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Paquete')->queryAll();

        $paginator = $this->get('knp_paginator');
        $paquetes = $paginator->paginate($query, $page, Paquete::NUM_ITEMS);
        $paquetes->setUsedRoute('paquete_index_paginated');

        return $this->render('paquete/index.html.twig', array('paquetes' => $paquetes));
    }

    /**
     * @Route("/paquete_detalle/{id}", name="paquete_detalle")
     */
    public function paqueteShowAction(Paquete $paquete)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCurrency = $em->getRepository('AppBundle:Currency');

        $currencyPesos = $repoCurrency->findByCode('ARS');
        $currencyDolares = $repoCurrency->findByCode('USD');

        $paquete->setPasajeroDefault(isset($_GET['pasajeros'])?$_GET['pasajeros']:"");
        $paquete->setMejorFecha(isset($_GET['fecha'])?$_GET['fecha']:"");

        $repoPaquete = $em->getRepository('AppBundle:Paquete');
        $paquetesCercanos = $repoPaquete->getPaquetesCercanos($paquete->getId());

        return $this->render('paquete/show.html.twig', array(
            'paquete' => $paquete,
            'currencyPesos' => $currencyPesos[0],
            'currencyDolares' => $currencyDolares[0],
            'paquetesCercanos' => $paquetesCercanos,
        ));
    }
}
