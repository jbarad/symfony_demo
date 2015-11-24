<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaqueteRepository")
 *
 * Defines the properties of the Paquete entity to represent the paquete paquetes.
 * See http://symfony.com/doc/current/book/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See http://symfony.com/doc/current/cookbook/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class Paquete
{
    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="paquete.blank_titulo")
     */
    private $titulo;

    /**
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="string")
     */
    private $descripcionLargaTitulo;

    /**
     * @ORM\Column(type="string")
     */
    private $descripcionCortaTitulo;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcionCortaTexto;

    /**
     * @ORM\Column(type="string")
     */
    private $salidasTitulo;

    /**
     * @ORM\Column(type="text")
     */
    private $salidasTexto;

    /**
     * @ORM\Column(type="string")
     */
    private $legalesTitulo;

    /**
     * @ORM\Column(type="text")
     */
    private $legalesTexto;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $validoDesde;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $validoHasta;

    /**
     * @ORM\Column(type="string")
     */
    private $pasajeros;

    /**
     * @ORM\Column(type="string")
     */
    private $moneda;

    /**
     * @ORM\Column(type="integer")
     */
    private $formaVenta;

    /**
     * @ORM\Column(type="integer")
     */
    private $activado;

    /**
     * @ORM\OneToMany(targetEntity="Bullet", mappedBy="paquete", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $bullets;

    /**
     * @ORM\OneToMany(targetEntity="Fecha", mappedBy="paquete", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $fechas;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="paquete", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $images;

    private $mejor_fecha;

    private $pasajero_default;

    public function __construct()
    {
        $this->bullets = new ArrayCollection();
        $this->fechas = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getDescripcionLargaTitulo()
    {
        return $this->descripcionLargaTitulo;
    }

    public function setDescripcionLargaTitulo($descripcionLargaTitulo)
    {
        $this->descripcionLargaTitulo = $descripcionLargaTitulo;
    }

    public function getDescripcionCortaTitulo()
    {
        return $this->descripcionCortaTitulo;
    }

    public function setDescripcionCortaTitulo($descripcionCortaTitulo)
    {
        $this->descripcionCortaTitulo = $descripcionCortaTitulo;
    }

    public function getDescripcionCortaTexto()
    {
        return $this->descripcionCortaTexto;
    }

    public function setDescripcionCortaTexto($descripcionCortaTexto)
    {
        $this->descripcionCortaTexto = $descripcionCortaTexto;
    }

    public function getSalidasTitulo()
    {
        return $this->salidasTitulo;
    }

    public function setSalidasTitulo($salidasTitulo)
    {
        $this->salidasTitulo = $salidasTitulo;
    }

    public function getSalidasTexto()
    {
        return $this->salidasTexto;
    }

    public function setSalidasTexto($salidasTexto)
    {
        $this->salidasTexto = $salidasTexto;
    }

    public function getLegalesTitulo()
    {
        return $this->legalesTitulo;
    }

    public function setLegalesTitulo($legalesTitulo)
    {
        $this->legalesTitulo = $legalesTitulo;
    }

    public function getLegalesTexto()
    {
        return $this->legalesTexto;
    }

    public function setLegalesTexto($legalesTexto)
    {
        $this->legalesTexto = $legalesTexto;
    }

    public function getValidoDesde()
    {
        return $this->validoDesde;
    }

    public function setValidoDesde(\DateTime $validoDesde)
    {
        $this->validoDesde = $validoDesde;
    }

    public function getValidoHasta()
    {
        return $this->validoHasta;
    }

    public function setValidoHasta(\DateTime $validoHasta)
    {
        $this->validoHasta = $validoHasta;
    }

    public function getPasajeros()
    {
        $pasajerosParsed = explode("-", substr($this->pasajeros, 1));

        return $pasajerosParsed;
    }

    public function getPasajerosFront()
    {
        $pasajeros = $this->getPasajeros();

        $pasajerosParsed = array();
        foreach($pasajeros as $pasajero) {
            $pasajerosParsed[$pasajero] = 1;
        }

        return $pasajerosParsed;
    }

    public function setPasajeros($pasajeros)
    {
        $pasajerosParsed = "-".implode("-", $pasajeros);

        $this->pasajeros = $pasajerosParsed;
    }

    public function getMoneda()
    {
        return $this->moneda;
    }

    public function getMonedaShow()
    {
        switch($this->moneda) {
            case "USD": $monedaParsed = "Dólares"; break;
            case "ARS": $monedaParsed = "Pesos"; break;
            default: $monedaParsed = ""; break;
        }
        return $monedaParsed;
    }

    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    }

    public function getFormaVenta()
    {
        return $this->formaVenta;
    }

    public function getFormaVentaShow()
    {
        switch($this->formaVenta) {
            case 0: $formaVentaParsed = "Vender por beneficio"; break;
            case 1: $formaVentaParsed = "Vender por pasajero"; break;
            default: $formaVentaParsed = ""; break;
        }
        return $formaVentaParsed;
    }

    public function setFormaVenta($formaVenta)
    {
        $this->formaVenta = $formaVenta;
    }

    public function getActivado()
    {
        return $this->activado;
    }

    public function setActivado($activado)
    {
        $this->activado = $activado;
    }

    public function getBullets()
    {
        return $this->bullets;
    }

    public function getFechas()
    {
        return $this->fechas;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function addBullet(Bullet $bullet)
    {
        if (!$this->bullets->contains($bullet)) {
            $bullet->setPaquete($this);
            $this->bullets->add($bullet);
        }

        return $this;
    }

    public function removeBullet(Bullet $bullet)
    {
        if ($this->bullets->contains($bullet)) {
            $this->bullets->removeElement($bullet);
        }

        return $this;        
    }    

    public function addFecha(Fecha $fecha)
    {
        if (!$this->fechas->contains($fecha)) {
            $fecha->setPaquete($this);
            $this->fechas->add($fecha);
        }

        return $this;
    }

    public function removeFecha(Fecha $fecha)
    {
        if ($this->fechas->contains($fecha)) {
            $this->fechas->removeElement($fecha);
        }

        return $this;        
    }

    private function getFecha($fecha_default){
        $res = false;
        if ($fecha_default) {
            foreach ($this->fechas as $fecha){
                if(strtotime($fecha->getFecha()) == strtotime($fecha_default)){
                    $res = $fecha;
                }
            }
        }
        return $res;
    }

    private function stockDisponible($fecha){
        $res = false;
        $stock = $fecha->getStock();
        if((!$this->formaVenta &&  $stock > 0) || ($this->formaVenta && $stock >= $this->pasajero_default)){
            $res = true;
        }
        return $res;
    }

    public function setMejorFecha($fecha_default){
        $mejor_fecha = $this->getFecha($fecha_default);
        
        if(!($mejor_fecha ) || !($this->stockDisponible($mejor_fecha))){
            foreach ($this->fechas as $fecha){
                if(!$mejor_fecha && $this->stockDisponible($fecha) && (strtotime($fecha->getFecha()->format('Y-m-d')) >= strtotime(date("Y-m-d")))){
                    $mejor_fecha = $fecha;
                    break;
                }
            }
            foreach ($this->fechas as $fecha){
                if(($mejor_fecha) && ($this->stockDisponible($fecha) && ($fecha->getPrecio() < $mejor_fecha->getPrecio()) && (strtotime($fecha->getFecha()) >= strtotime(date("Y-m-d")))) ){
                    $mejor_fecha = $fecha;
                }
            }
        }
        $this->mejor_fecha = $mejor_fecha;
    }

    public function getMejorFecha()
    {
        return $this->mejor_fecha;
    }

    public function setPasajeroDefault($param){
        if(array_key_exists($param, $this->getPasajerosFront())){
            $this->pasajero_default = (int) $param;
        }else {
            $this->pasajero_default = (int) key($this->getPasajerosFront());
        }
    }

    public function getPasajeroDefault()
    {
        return $this->pasajero_default;
    }
}
