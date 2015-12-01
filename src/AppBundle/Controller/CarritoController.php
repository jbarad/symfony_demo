<?php

namespace AppBundle\Controller;

use AppBundle\Form\PaxType;
use AppBundle\Entity\Carrito;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Intl;

/**
 * @Route("/carrito")
 */
class CarritoController extends Controller
{
    /**
     * @Route("/", name="carrito_index")
     */
    public function carritoIndexAction(Request $request)
    {
        var_dump($request);
        exit;
    }

    /**
     * @Route("/{id}", name="carrito_detalle")
     */
    public function carritoShowAction(Request $request)
    {
        $idFecha = $this->get('session')->get('fechaId');
        $pasajeros = $this->get('session')->get('pasajeros');

        $em = $this->getDoctrine()->getManager();
        $repoFecha = $em->getRepository('AppBundle:Fecha');

        $fechaObject = $repoFecha->findOneById($idFecha);

        $repoCurrency = $em->getRepository('AppBundle:Currency');

        $currencyPesos = $repoCurrency->findOneByCode('ARS');

        /* BEGIN - Armo el form */
        $formBuilder = $this->createFormBuilder();
        for ($i=1; $i<=$pasajeros; $i++) {
            $formBuilder->add("pax_$i", new PaxType());
        }
        $formBuilder->add("email", "email");
        $formBuilder->add("areacode", "text", array('data' => '011'));
        $formBuilder->add("phone", "text");
        $formBuilder->add("termsandcond", "checkbox", array('label' => false));
        /* END - Armo el form */

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ('POST' === $request->getMethod())
        {
            $data = $form->getData();
            $errores_checkout = $this->validarForm($pasajeros, $data);

            if (!$errores_checkout) {
                //REDIRECT
                var_dump($data);
                exit;
            }
        }
        else {
            $errores_checkout=false;
        }

        return $this->render('carrito/show.html.twig', array(
            'paquete' => $fechaObject->getPaquete(),
            'fecha' => $fechaObject,
            'pasajeros' => $pasajeros,
            'currencyPesos' => $currencyPesos,
            'form' => $form->createView(),
            'errores_checkout' => $errores_checkout,
        ));
    }

    private function validarForm($pasajeros, $data) {
        for ($i=1; $i<=$pasajeros; $i++) {
            if (empty($data["pax_".$i]["name"])) {
                $err["pax_".$i."_name"] = "Por favor, ingresá el nombre";
            }
            if (empty($data["pax_".$i]["lastname"])) {
                $err["pax_".$i."_lastname"] = "Por favor, ingresá el apellido";
            }
            if (empty($data["pax_".$i]["dni"])) {
                $err["pax_".$i."_dni"] = "Por favor, ingresá el Documento de Viaje";
            }
            if (empty($data["pax_".$i]["diafechanac"]) || empty($data["pax_".$i]["mesfechanac"]) || empty($data["pax_".$i]["aniofechanac"])) {
                $err["pax_".$i."_fechanac"] = "Indique su fecha de nacimiento";
            }
        }
        if (empty($data["email"])) {
            $err["email"] = "Por favor, ingresá un email de contacto";
        }
        if (empty($data["areacode"]) || empty($data["phone"])) {
            $err["telefono"] = "Por favor, ingresá un teléfono";
        }
        if (empty($data["termsandcond"])) {
            $err["termsandcond"] = "Por favor, aceptá los términos y condiciones para continuar.";
        }

        return $err;
    }
}
