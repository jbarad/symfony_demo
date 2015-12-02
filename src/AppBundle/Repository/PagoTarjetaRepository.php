<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PagoTarjetaRepository extends EntityRepository
{
	public function findAllChoices() {
        $tarjetas = $this->findAll();

        $tarjetasArray = array();

        foreach($tarjetas as $tarjeta) {
        	$tarjetasArray[$tarjeta->getId()] = $tarjeta->getNombre();
        }

        return $tarjetasArray;
	}
}
