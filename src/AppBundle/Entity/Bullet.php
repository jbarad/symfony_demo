<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Bullet")
 */
class Bullet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
     * @ORM\ManyToOne(targetEntity="Paquete", inversedBy="bullets")
     * @ORM\JoinColumn(name="idPaquete", referencedColumnName="id", nullable=FALSE)
     */
    protected $paquete;

    /**
     * @ORM\Column(type="string")
     */
    private $texto;

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

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
}