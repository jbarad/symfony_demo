<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FechaRepository")
 * @ORM\Table(name="Fecha")
 */
class Fecha
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
     * @ORM\ManyToOne(targetEntity="Paquete", inversedBy="fechas")
     * @ORM\JoinColumn(name="idPaquete", referencedColumnName="id", nullable=FALSE)
     */
    protected $paquete;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio;

    /**
     * @ORM\Column(type="integer")
     */
    private $afip;

    /**
     * @ORM\OneToMany(targetEntity="Carrito", mappedBy="fecha", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $carritos;

    public function __construct()
    {
        $this->carritos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

	public function getPaquete()
    {
        return $this->paquete;
    }

    public function setPaquete(Paquete $paquete)
    {
        $this->paquete = $paquete;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getAfip()
    {
        return $this->afip;
    }

    public function setAfip($afip)
    {
        $this->afip = $afip;
    }

    public function getCarritos()
    {
        return $this->carritos;
    }

    public function addCarrito(Carrito $carrito)
    {
        if (!$this->carritos->contains($carrito)) {
            $carrito->setFecha($this);
            $this->carritos->add($carrito);
        }

        return $this;
    }

    public function removeCarrito(Carrito $carrito)
    {
        if ($this->carritos->contains($carrito)) {
            $this->carritos->removeElement($carrito);
        }

        return $this;        
    }

}