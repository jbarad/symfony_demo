<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PagoBancoRepository extends EntityRepository
{
	public function findAllChoices() {
        $bancos = $this->findAll();

        $bancosArray = array();

        foreach($bancos as $banco) {
        	$bancosArray[$banco->getId()] = $banco->getNombre();
        }

        return $bancosArray;
	}
}
