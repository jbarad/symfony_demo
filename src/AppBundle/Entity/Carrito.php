<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Carrito")
 */
class Carrito
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
     * @ORM\ManyToOne(targetEntity="Fecha", inversedBy="carritos")
     * @ORM\JoinColumn(name="idFecha", referencedColumnName="id", nullable=FALSE)
     */
    protected $fecha;

    /**
     * @ORM\Column(type="string")
     */
    private $currency;

    /**
     * @ORM\Column(type="integer")
     */
    private $pasajeros;

    public function getId()
    {
        return $this->id;
    }

	public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha(Fecha $fecha)
    {
        $this->fecha = $fecha;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function setPasajeros($pasajeros)
    {
        $this->pasajeros = $pasajeros;
    }
}