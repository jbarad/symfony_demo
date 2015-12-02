<?php

namespace AppBundle\Controller;

use AppBundle\Form\PaxType;
use AppBundle\Entity\Carrito;
use AppBundle\Entity\PagoBanco;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Intl;
use Doctrine\ORM\Query;

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

        $form = $formBuilder->getForm();

        $form->handleRequest($request);
        /* END - Armo el form */

        if ('POST' === $request->getMethod())
        {
            $data = $form->getData();
            $errores_checkout = $this->validarForm($pasajeros, $data);

            if (!$errores_checkout) {
                $metodo = $this->get('request')->request->get('metodo');

                //TODO REDIRECCIONAR A COMPRA CON TARJETA O A PAGINA DE GRACIAS SEGUN CORRESPONDA

                if ($metodo=="1") {
                    $SECURE_SITE_URL = $this->container->getParameter('url_ssl');
                    return $this->redirect($this->generateUrl('carrito_pago_tarjeta'));
                    exit;
                }
                else {

                }
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

    /**
     * @Route("/pago/tarjeta", name="carrito_pago_tarjeta")
     */
    public function carritoPagoTarjetaAction(Request $request)
    {
        $idFecha = $this->get('session')->get('fechaId');
        $pasajeros = $this->get('session')->get('pasajeros');

        $em = $this->getDoctrine()->getManager();
        $repoFecha = $em->getRepository('AppBundle:Fecha');

        $fechaObject = $repoFecha->findOneById($idFecha);

        $repoCurrency = $em->getRepository('AppBundle:Currency');

        $currencyPesos = $repoCurrency->findOneByCode('ARS');

        $repoPagoBanco = $em->getRepository('AppBundle:PagoBanco');
        $bancos = $repoPagoBanco->findAllChoices();

        $repoPagoTarjeta = $em->getRepository('AppBundle:PagoTarjeta');
        $tarjetas = $repoPagoTarjeta->findAllChoices();

        $paises = array();
        $paises["AR"] = "Argentina";
        $paises["BO"] = "Bolivia";
        $paises["BR"] = "Brasil";
        $paises["CL"] = "Chile";

        /* BEGIN - Armo el form */
        $formBuilder = $this->createFormBuilder();
        $formBuilder->add("banco", "choice", array(
            "choices" => $bancos,
        ));
        $formBuilder->add("card", "choice", array(
            "choices" => $tarjetas,
        ));
        
        $formBuilder->add("numerotarjeta", "text", array("required"=>false));
        $formBuilder->add("nomape", "text", array("required"=>false));
        $formBuilder->add('mesfechavenc', 'choice', array(
            'choices' => array_combine(range(1,12),range(1,12)),
        ));
        $formBuilder->add('aniofechavenc', 'choice', array(
            'choices' => array_combine(range(date("Y"),date("Y")+9),range(date("Y"),date("Y")+9)),
        ));
        $formBuilder->add("codigoseguridad", "text", array("required"=>false));
        
        $formBuilder->add("dnitit", "text", array("required"=>false));
        $formBuilder->add('diafechanac', 'choice', array(
            'choices' => array_combine(range(1,31),range(1,31)),
            'empty_value' => 'Día',
            "required"=>false,
        ));
        $formBuilder->add('mesfechanac', 'choice', array(
            'choices' => array_combine(range(1,12),range(1,12)),
            'empty_value' => 'Mes',
            "required"=>false,
        ));
        $formBuilder->add('aniofechanac', 'choice', array(
            'choices' => array_combine(range(date("Y"),1900),range(date("Y"),1900)),
            'empty_value' => 'Año',
            "required"=>false,
        ));
        $formBuilder->add("domiciliotit", "text", array("required"=>false));
        $formBuilder->add("ciudadtit", "text", array("required"=>false));

        $formBuilder->add("paistit", "choice", array(
            "choices" => $paises,
        ));

        $form = $formBuilder->getForm();

        $form->handleRequest($request);
        /* END - Armo el form */

        if ('POST' === $request->getMethod())
        {
            $data = $form->getData();
            $errores_checkout = $this->validarFormTarjeta($data);

            if (!$errores_checkout) {
                var_dump($data);exit;
                //TODO REALIZAR COMPRA CON TARJETA CREDITO. INSERCION EN BASE DE DATOS Y REDIRECCION A PAGINA GRACIAS ????
            }
        }
        else {
            $errores_checkout=false;
        }

        return $this->render('carrito/pago_tarjeta.html.twig', array(
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

        return empty($err)?false:$err;
    }

    private function validarFormTarjeta($data) {
        if (empty($data["numerotarjeta"])) {
            $err["numerotarjeta"] = "Por favor, ingresá un número de tarjeta válido";
        }
        if (empty($data["nomape"])) {
            $err["nomape"] = "Por favor, ingresá el nombre y apellido del titular";
        }
        if (empty($data["codigoseguridad"])) {
            $err["codigoseguridad"] = "Por favor, ingresá un código de seguridad válido";
        }
        if (empty($data["dnitit"])) {
            $err["dnitit"] = "Por favor, ingresá el DNI del titular";
        }
        if (empty($data["diafechanac"]) || empty($data["mesfechanac"]) || empty($data["aniofechanac"])) {
            $err["fechanac"] = "Por favor, ingresá la fecha de nacimiento";
        }
        if (empty($data["domiciliotit"])) {
            $err["domiciliotit"] = "Por favor, ingresá el domicilio";
        }
        if (empty($data["ciudadtit"])) {
            $err["ciudadtit"] = "Por favor, ingresá la ciudad";
        }

        return empty($err)?false:$err;
    }    
}
